<?php

namespace App\Http\Controllers\API\Patient;

use App\Http\Controllers\Controller;
use App\Http\Traits\ResponseTrait;
use App\Models\history;
use Illuminate\Http\Request;

class PatientHistoryController extends Controller
{
    //
    use ResponseTrait;
    public function PatientHistory(){
        try{
            if(auth('patient-api')->id() != null){
                $patient_id = auth('patient-api')->id();
                $history_object = new history();
                $history = $history_object->GetPatientHistory($patient_id);
                 $history = $history->map(function ($item) {
                    $item->disease_name = $item->disease->disease_name;
                    $item->sub_disease_name = $item->sub_disease->Sub_disease_name;
                    $item->image = env('APP_URL').$item->image;
                    $item->check_date = $item->created_at->format('Y.m.d g:i A');
                    unset($item->disease);
                    unset($item->sub_disease);
                    unset($item->disease_id);
                    unset($item->sub_disease_id);

                    return collect($item)->only([
                        'id',
                        'patient_id',
                        'image',
                        'disease_name',
                        'sub_disease_name',
                        'check_date'
                    ]);
                });
                return $this->returnData("Patient History",$history);
            }else{
                return $this->returnError('E500', 'Please login to your account');
                // check login student
            }      
        }catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        } 
    }
}
