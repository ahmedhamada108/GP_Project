<?php

namespace App\Http\Controllers\CheckupWebsite\Patient;

use App\Models\history;
use App\Models\settings;
use Illuminate\Http\Request;
use App\Models\PatientVerify;
use Carbon\Traits\Localization;
use App\Http\Controllers\Controller;
use App\Http\Traits\PatientAuthTrait;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class HistoryController extends Controller
{
    public function History_view(){
        $histories = history::with(
            ['disease','disease:id,diseases_name_'.LaravelLocalization::getCurrentLocale().' as disease_name',
            'sub_disease','sub_disease:id,sub_disease_'.LaravelLocalization::getCurrentLocale().' as Sub_disease_name'
            ])->where('patient_id',auth('patient')->id())->paginate(10);

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
        return view('checkup.history',compact(['histories','settings']));
    }
}
