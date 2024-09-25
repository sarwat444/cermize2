<?php

namespace App\Helpers;

class ApiHelper
{
    public static function getMatches($startDate, $endDate, $apiToken)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.sportmonks.com/v3/football/fixtures/between/$startDate/$endDate",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_POSTFIELDS => json_encode(['api_token' => $apiToken]),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);

        $data = json_decode($response, true);

        // Check if 'data' key exists and contains matches
        return $data['data'] ?? [];
    }

    public static function getTeamLogos(array $teamNames, $apiToken)
    {
        $teamLogos = [];
        foreach ($teamNames as $teamName) {
            $teamLogos[$teamName] = self::fetchTeamLogo($teamName, $apiToken);
        }
        return $teamLogos;
    }

    private static function fetchTeamLogo($teamName, $apiToken)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.sportmonks.com/v3/football/teams/search/$teamName",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_POSTFIELDS =>'{
                "api_token" : "' . $apiToken . '"
            }',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);

        $data = json_decode($response, true);

        return $data['data'][0]['image_path'] ?? asset('public/logo.png');
    }

    public static function  Teamgroups()
    {
        $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.statorium.com/api/v1/standings/321?apikey=aba9a5184a156a9a3a60810bed98ef43',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            ));

            $response = curl_exec($curl);
            curl_close($curl);

            $data = json_decode($response, true);

            // Check if 'data' key exists and contains matches
            return $data['season']['groups'] ?? [];

    }
    public static function Rounds()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.sportmonks.com/v3/football/rounds/seasons/22842',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_POSTFIELDS => '{
                "api_token" : "mnXQIe4GiLIHqUJFIPtU3Irb69ymdXj8oWt5AJZ57DjxjyCfZOFzolgkHRs6"
            }',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);

        $data = json_decode($response, true);
        $rounds = $data['data'] ?? [];

        // Sort the data by 'id' in ascending order
        usort($rounds, function($a, $b) {
            return $a['id'] <=> $b['id'];
        });

        return $rounds;
    }
    public static function Round($round_id)
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://api.sportmonks.com/v3/football/rounds/'.$round_id.'?include=fixtures',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
          CURLOPT_POSTFIELDS =>'{
            "api_token" : "mnXQIe4GiLIHqUJFIPtU3Irb69ymdXj8oWt5AJZ57DjxjyCfZOFzolgkHRs6"
        }',
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
          ),
        ));


        $response = curl_exec($curl);
        curl_close($curl);
        $data = json_decode($response, true);
        return $data['data']['fixtures'] ?? [];

    }


    public static function  LiveMatches()
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://api.sportmonks.com/v3/football/livescores/inplay?include=events',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
          CURLOPT_POSTFIELDS =>'{
            "api_token" : "mnXQIe4GiLIHqUJFIPtU3Irb69ymdXj8oWt5AJZ57DjxjyCfZOFzolgkHRs6"
        }',
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
          ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        $data = json_decode($response, true);
        return $data['data']?? [];

    }



}
