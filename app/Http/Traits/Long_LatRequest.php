<?php

namespace App\Http\Traits;

use Illuminate\Http\Request;
use App\Http\Traits\ResponseTrait;
use Illuminate\Support\Facades\Http;


trait Long_LatRequest
{
    use ResponseTrait;
    public function LocationRequest($long,$lat){
        $apiKey = "40da2b1ae0d64ef8903ee23d94e204d1";
        $response = Http::get('https://api.geoapify.com/v1/geocode/reverse', [
            'lat' => $lat,
            'lon' => $long,
            'apiKey' => $apiKey,
        ]);
        
        if ($response->ok()) {
            $response = json_decode($response);
           return $response->features[0]->properties->state;        
        } else {
            return $this->returnError('E423','Error in get location');
        }
    }

}