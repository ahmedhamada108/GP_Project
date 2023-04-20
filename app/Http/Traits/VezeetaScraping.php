<?php

namespace App\Http\Traits;

use App\Http\Traits\ResponseTrait;
use Goutte\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cities;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\HttpClient\HttpClient;


class VezeetaScraping extends Controller
{
    //
    use ResponseTrait;
    public function GetCities(){
        
        $data= [];
        $data_value =[];
        $client = new HttpBrowser(HttpClient::create());
        $crawler = $client->request('GET', 'https://www.vezeeta.com/en');
        $crawler->filter('.ettccG > div > div > div.Xrbgx  > div.eacFSj > #generated_envelopeId_city .Xcvks > div:nth-child(2) span ul li')
         ->each(function ($node) use (&$data,&$data_value) {
            $data_value[] = [
                'country' => $node->attr('data-value'),
            ];
            $data[] = [
                'country' => strtolower(trim($node->text()))
            ];
        });
        return $data;
    }
    public static function GetDoctorEnglish($city_patient,$specialization){
        $searched_country = Cities::where('city_name_en','LIKE','%'.$city_patient.'%')->first();

        $client = new HttpBrowser(HttpClient::create());
        // $city = rawurlencode('الإسكندرية');
        // $takhsos= rawurlencode('كل-التخصصات');
        // $doctor_url = rawurlencode('دكتور');
        // $crawler = $client2->request('GET', 'https://www.vezeeta.com/ar/'.$doctor_url.'/'.$takhsos.'/'.$city);
        $crawler = $client->request('GET', 'https://www.vezeeta.com/en/doctor/'.$specialization.'/'.$searched_country->data_value_en);
        $doctor_data= [];
        $crawler->filter('.ialMBZ .gUJAmE, .iSrHyn > span')
        ->each(function ($node) use (&$doctor_data){
            
            $doctor = $node->filter('.gtJINS span')->text();
            $doctor_name = $node->filter('.gtJINS a span')->text();
            $description = $node->filter('.gtJINS h3')->text();
            $address= $node->filter('.gtJINS .wnblj .blwPZf')->text();
            $fee= $node->filter('.gtJINS .wnblj span[itemprop="priceRange"]')->text();
            $doctor_image = $node->filter('.kbqvaU span > div > img');
            if ($doctor_image->attr('src') != null) {
                $doctor_image = $doctor_image->attr('src');
            } else {
                $doctor_image = $doctor_image->attr('data-src');
            }
            $doctor_profile = $node->filter('.gtJINS a')->attr('href');
            $doctor_data[] = [
                'Doctor_name' => $doctor . " " .$doctor_name,
                'Doctor_description' => $description,
                'Address' => $address,
                'Doctor_fee' => $fee. ' EPG',
                'Doctor_image' => $doctor_image ? $doctor_image : 'https://d1aovdz1i2nnak.cloudfront.net/vezeeta-web-reactjs/54241/_next/static/images/avatar.png',
                'Doctor_profile' => 'https://www.vezeeta.com'.$doctor_profile
            ];
        });
        return $doctor_data;
    }
    public function GetDoctorArabic($city_patient,$specialization){
        $searched_country = Cities::where('city_name_en','LIKE','%'.$city_patient.'%')->first();

        $client = new HttpBrowser(HttpClient::create());
        $city = rawurlencode($searched_country->data_value_ar);
        $specialities= rawurlencode($specialization);
        $doctor_url = rawurlencode('دكتور');
        $crawler = $client->request('GET', 'https://www.vezeeta.com/ar/'.$doctor_url.'/'.$specialities.'/'.$city);
        $doctor_data = [];
        $crawler->filter('.fQCsnd .hUpjhz, .gsDqLc > span')
        ->each(function ($node2) use (&$doctor_data){

            $doctor = $node2->filter('.cIJIvF span')->text();
            $doctor_name = $node2->filter('.cIJIvF a span')->text();
            $description = $node2->filter('.cIJIvF h3')->text();
            $address= $node2->filter('.cIJIvF .wnblj .blwPZf')->text();
            $fee= $node2->filter('.cIJIvF .wnblj span[itemprop="priceRange"]')->text();
            $doctor_image = $node2->filter('.kbqvaU span > div > img');
            if ($doctor_image->attr('src') != null) {
                $doctor_image = $doctor_image->attr('src');
            } else {
                $doctor_image = $doctor_image->attr('data-src');
            }            
            $doctor_profile = $node2->filter('.cIJIvF a')->attr('href');
            $doctor_data[] = [
                'Doctor_name' => $doctor . " " .$doctor_name,
                'Doctor_description' => $description,
                'Address' => $address,
                'Doctor_fee' => $fee. ' جنيه ',
                'Doctor_image' => $doctor_image ? $doctor_image : 'https://d1aovdz1i2nnak.cloudfront.net/vezeeta-web-reactjs/54241/_next/static/images/avatar.png',
                'Doctor_profile' => 'https://www.vezeeta.com'.$doctor_profile
            ];
        });
        return $doctor_data;
    }
}
