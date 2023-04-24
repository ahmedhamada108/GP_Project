<?php

namespace App\Http\Controllers\CheckUpWebsite;

use App\Models\Diseases;
use App\Models\settings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\FQA;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class HomeController extends Controller
{
    //
    public function index_view(){
        $diseases = Diseases::select(
            'id',
            'diseases_name_'.LaravelLocalization::getCurrentLocale().' as disease_name',
            'diseases_name_en',
            'diseases_description_'.LaravelLocalization::getCurrentLocale(). ' as diseases_description',
            'image'
        )->get();
        $settings = settings::select(
            'facebook_url',
            'twiiter_url',
            'linkedin_url',
            'google_url',
            'location',
            'email',
            'phone',
            'website_description_'.LaravelLocalization::getCurrentLocale().' as website_description',
            'about_us_'.LaravelLocalization::getCurrentLocale().' as about_us',

            )->find(1);
        $FQAs = FQA::select(
            'id',
            'quest_'.LaravelLocalization::getCurrentLocale().' as quest',
            'answer_'.LaravelLocalization::getCurrentLocale().' as answer',
        )->get();  
        // return $settings;
        return view('checkup.home',compact(['diseases','settings','FQAs']));
    }
}
