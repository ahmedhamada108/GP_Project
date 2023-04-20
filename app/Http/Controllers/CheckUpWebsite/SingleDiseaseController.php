<?php

namespace App\Http\Controllers\CheckUpWebsite;

use App\Models\Diseases;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SubDiseasesDescription;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class SingleDiseaseController extends Controller
{
    //
    public function SingleDisease_view($disease_name){
        $disease_id = null;
        switch($disease_name){
            case 'Retinal OCT Diseases':
            case 'امراض شبكيه العين':   
                $disease_id = 1;
                break;
            case 'Alzheimer':
            case 'الزهايمر':    
                $disease_id = 2;
                break;   
            case 'Brain Stroke':
            case 'السكتة الدماغية': 
                $disease_id = 3;
                break;
            case 'Chest X-Ray':
            case 'الاشعه المقطعيه للصدر': 
                $disease_id = 4;
                break;
            default:
                $disease_id = -1;
                break;              
        }
        $sub_diseases = SubDiseasesDescription::GetSubDiseases($disease_id);
        // return $sub_diseases['disease_name'];
        // return $sub_diseases;
        return view('checkup.upload_file',compact('sub_diseases'));
    }
}
