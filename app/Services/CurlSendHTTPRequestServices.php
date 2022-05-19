<?php

namespace App\Services;

class CurlSendHTTPRequestServices{


    public static function curl($url){

        $curl = curl_init();

        $option = [
            CURLOPT_URL => $url,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_HEADER => true
        ];

        curl_setopt_array($curl,$option);

        $response = curl_exec($curl);

        $header_size = curl_getinfo($curl,CURLINFO_HEADER_SIZE);
        $body = substr($response,$header_size);

        curl_close($curl);

        return $body;
    }

}
