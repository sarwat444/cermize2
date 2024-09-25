<?php

use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Models\{Reservation , event} ;


function locales()
{
    $arr = [];
    foreach (LaravelLocalization::getSupportedLocales() as $key => $value) {
        $arr[$key] = __('translate.' . $key);
    }
    return $arr;
}

function default_locales()
{
    $arr = [];
    foreach (LaravelLocalization::getSupportedLocales() as $key => $value) {
        $arr[$key] = __('translate.' . $key);
    }
    return $arr;
}


function uploadFile($file, $custome_path='', $is_full_path=false)
{
    if ($custome_path == '') {
            $path = public_path('uploads/files/');
    } else {
        if(!$is_full_path) {
            $path = public_path('uploads/'.$custome_path);
        }else{
            $path = $custome_path;
        }
    }
    $extension = $file->getClientOriginalExtension();
   // dd($extension);
    $filename = 'file_' . time() . mt_rand() . '.' . $extension;
    $originalName = str_replace('.' . $extension, '', $file->getClientOriginalName());
    $file->move($path, $filename);
    return 'uploads/'. $custome_path . '/' .$filename;
}

function uploadImage($image, $custome_path='', $is_full_path=false)
{
    if ($custome_path=='') {
        $path = public_path('uploads/images/');
    } else {
        if(!$is_full_path) {
            $path = public_path('uploads/'.$custome_path);
        }else{
            $path = $custome_path;
        }
    }
    $extension    = $image->getClientOriginalExtension();
    $imagename    = 'image_' . time() . mt_rand() . '.' . $extension;
    $image->move($path, $imagename);

    return 'uploads/'. $custome_path . '/' .$imagename;
}



function createToken($appId , $appCertificate , $channelName) {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://mehandrucompany.com/agoraToken/sample/RtcTokenBuilderSample.php',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => array('appId' => $appId, 'appCertificate' => $appCertificate, 'channelName' => $channelName),
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    return $response;
}

function generateRandomString($length = 7) {

    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charLength - 1)];
    }
    return $randomString;
}

     function check_event_already_exists($start, $end)
    {
        return event::where(function ($query) use ($start, $end) {
            $query->where(function ($q) use ($start, $end) {
                $q->where('e_events_from', '<=', $start)
                    ->where('e_events_to', '>', $start);
            })
                ->orWhere(function ($q) use ($start, $end) {
                    $q->where('e_events_from', '>=', $start)
                        ->where('e_events_to', '<=', $end);
                })
                ->orWhere(function ($q) use ($start, $end) {
                    $q->where('e_events_from', '>', $start)
                        ->where('e_events_from', '<', $end);
                });
        })->exists();
    }





