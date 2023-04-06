<?php

namespace App\Http\Traits;

trait RequestModelsTrait
{
    public function RequestModel($model_url,$storage_filename,$img_name){
        $url = $model_url ;
        
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        
        $headers = array(
           "Content-Type: application/json",
        );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        $image_url= env('APP_URL')."/storage"."/".$storage_filename."/".$img_name;
        $data = json_encode(array(
            "image_url" => $image_url
        ));        
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        
        //for debug only!
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        
        $resp = curl_exec($curl);
        curl_close($curl);
        // Decode the JSON string to a PHP associative array
        $result = json_decode($resp, true);
        return $result;
    }

}
