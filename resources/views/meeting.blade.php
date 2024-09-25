<!DOCTYPE html>
<html>
<head>
    <title>Agora Video Call</title>
    <script src="{{asset(config('constants.asset_path').'vendor/AgoraRTCSDK.js')}}"></script>
</head>
<body>

<div id="local-stream" style="display: none;"></div>
<div id="remote-stream" style="display: none;"></div>

<script>
    async function initAgora() {
        const token = await fetchToken(); // Fetch token using AJAX

        const appId = '{{ env('AGORA_APP_ID') }}';
        const channelName = 'your_channel_name'; // Replace with your desired channel name
        const uid = '{{ uniqid() }}'; // Generate a unique user ID (optional)

        client = AgoraRTC.createClient({ codec: AgoraRTC.聲道類型.RAW });
        client.setClientRole(AgoraRTC.角色.BROADCASTER); // Adjust role as needed (BROADCASTER or AUDIENCE)

        try {
            await client.initialize(appId, token);
            console.log("Agora client initialized");

            localStream = await AgoraRTC.createMicrophoneAndCameraStream({ video: true, audio: true });
            localStream.setVideoProfile(AgoraRTC.视频规格.QVGA); // Adjust video profile as needed

            document.getElementById('local-stream').appendChild(localStream.video);
            await client.join(channelName, null, uid);

            client.on('user-joined', (uid) => {
                console.log("User joined:", uid);
                remoteStream = await client.createRemoteVideoStream(uid);
                document.getElementById('remote-stream').appendChild(remoteStream.video);
            });

            client.on('user-published', (uid, mediaType) => {
                console.log("User published stream:", uid, mediaType);
                if (mediaType === 'video') {
                    remoteStream.play();
                }
            });

            client.on('user-unpublished', (uid, mediaType) => {
                console.log("User unpublished stream:", uid, mediaType);
                if (mediaType === 'video') {
                    remoteStream.stop();
                }
            });

            client.on('user-left', (uid) => {
                console.log("User left:", uid);
                if (remoteStream) {
                    remoteStream.close();
                    document.getElementById('remote-stream').innerHTML = '';
                }
            });
        } catch (error) {
            console.error(error);
        }
    }

    async function fetchToken() {
        const response = await fetch('/api/agora/token', {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'Authorization': 'Bearer YOUR_API_TOKEN' // Replace with your authorized access token
            },
            body: JSON.stringify({ channelName: 'your_desired_channel_name' }) // Replace with desired channel name
        });

        const data = await response.json();
        return data.token;
    }
</script>

<button onclick="initAgora()">Join Channel</button>

</body>
</html>
