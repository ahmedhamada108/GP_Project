<?php

namespace App\Http\Controllers\CheckupWebsite\Patient;

use App\Models\history;
use Carbon\Traits\Localization;
use Illuminate\Http\Request;
use App\Models\PatientVerify;
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
            // return $histories;
        return view('checkup.history',compact('histories'));
    }
}
