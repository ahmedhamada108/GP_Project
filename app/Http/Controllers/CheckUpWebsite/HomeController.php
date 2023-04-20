<?php

namespace App\Http\Controllers\CheckUpWebsite;

use App\Models\Diseases;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        
        return view('checkup.home',compact('diseases'));
    }
}
