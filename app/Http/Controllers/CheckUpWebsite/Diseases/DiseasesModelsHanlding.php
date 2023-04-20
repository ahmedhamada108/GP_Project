<?php

namespace App\Http\Controllers\CheckUpWebsite\Diseases;

use App\Models\history;
use App\Models\Diseases;

use Illuminate\Http\Request;
use App\Http\Traits\ResponseTrait;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Http\Traits\VezeetaScraping;
use App\Models\SubDiseasesDescription;
use App\Http\Traits\RequestModelsTrait;
use App\Http\Traits\RequestModelsWeb;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class DiseasesModelsHanlding extends Controller
{
    //
    use RequestModelsTrait, ResponseTrait, RequestModelsWeb;
    public function SendModelRequest(Request $request){
    //    return $this->SendRequestModel($request,$data_func);
        $url = collect(explode('/', url()->previous()))->last() ;
        switch($url){
            case "Alzheimer":
            case rawurlencode('الزهايمر'):
                $data_func = [
                    'external_api' => 'http://185.38.148.55/alzheimer_model',
                    'filename_storage' => 'AlzahimarImages',
                    'disease' => 'Alzheimer',
                    'specialization_en' => 'neurology',
                    'specialization_ar' => 'مخ-واعصاب'
                ];
            return $this->SendRequestModel($request,$data_func);

            case "Brain%20Stroke":
            case rawurlencode('السكتة الدماغية'):
                $data_func = [
                    'external_api' => 'http://185.38.148.55/Stroke_Brain_Model',
                    'filename_storage' => 'BrainStrokeImages',
                    'disease' => 'Brain Stroke',
                    'specialization_en' => 'neurology',
                    'specialization_ar' => 'مخ-واعصاب'
                ];
                return $this->SendRequestModel($request,$data_func);

            case "Retinal%20OCT%20Diseases":
            case rawurlencode('امراض شبكيه العين'):
                $data_func = [
                    'external_api' => 'http://185.38.148.55/OCT_model',
                    'filename_storage' => 'OCTImages',
                    'disease' => 'Retinal OCT Diseases',
                    'specialization_en' => 'ophthalmology',
                    'specialization_ar' => 'عيون'
                ];    
                return $this->SendRequestModel($request,$data_func);

            case "Chest%20X-Ray":
            case rawurlencode('الاشعه المقطعيه للصدر'):
                $data_func = [
                    'external_api' => 'http://185.38.148.55/X_Ray_Model',
                    'filename_storage' => 'XRayImages',
                    'disease' => 'Chest X-Ray',
                    'specialization_en' => 'chest',
                    'specialization_ar' => 'صدر'
                ];   
            return $this->SendRequestModel($request,$data_func);
            default:
                session()->flash('error','Please try Again.');
                return redirect()->route('single_disease');

        }
    }       

}
