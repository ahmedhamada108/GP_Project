<?php

namespace App\Http\Controllers\API\Diseases;

use App\Models\history;
use App\Models\Diseases;

use Illuminate\Http\Request;
use App\Http\Traits\ResponseTrait;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Http\Traits\Long_LatRequest;
use App\Models\SubDiseasesDescription;
use App\Http\Traits\RequestModelsTrait;
use App\Http\Traits\VezeetaScraping;

class Alzahimar_Disease extends Controller
{
    //
    use RequestModelsTrait, ResponseTrait, Long_LatRequest;
    public function SendAlzahimar(Request $request){
        // try{
            if(auth('patient-api')->id() != null){
                $data = $request->validate([
                    'image' => 'required|image'
                ]);
                $file_extension = $request->image->getClientOriginalExtension();
                $img_name = time() . '.' . $file_extension;
                $path = storage_path('app/public/AlzahimarImages');
                $request->image->move($path, $img_name);
                $data['image']= '/storage/AlzahimarImages/'.$img_name;
                $model_url = "http://185.38.148.55/alzheimer_model";
                $storage_filename = "AlzahimarImages";
                $result = $this->RequestModel($model_url,$storage_filename,$img_name);
                $result_value = $result['Result'];
                $disease = Diseases::select(
                        'id',
                        'diseases_name_'.app()->getLocale().' as disease_name'
                    )->where('diseases_name_en','Alzheimer')->first();

                $sub_disease = SubDiseasesDescription::select(
                        'id',
                        'sub_disease_'.app()->getLocale().' as sub_disease',
                        'description_'.app()->getLocale().' as description'
                    )->where('sub_disease_en',$result_value)->first();
                history::create([
                    'patient_id' => auth('patient-api')->id(),
                    'disease_id' => $disease->id,
                    'sub_disease_id' => $sub_disease->id,
                    'image' => $data['image']
                ]);
                $location_country = $this->LocationRequest($request->long,$request->lat);
                $Doctors = new VezeetaScraping();
                if($result_value == "Non Dementia" || $result_value == 'Normal'){
                    if(App::getLocale()=="en"){
                        $VezzetaDoctors = [];
                        $sub_disease->setAttribute('Total_Vezzeta_Doctors',count($VezzetaDoctors));
                        return $this->returnDataMultiArray('Result Check',$sub_disease,'Vezzeta Doctors',$VezzetaDoctors);
                    }else{
                        $VezzetaDoctors = [];
                        $sub_disease->setAttribute('Total_Vezzeta_Doctors',count($VezzetaDoctors));
                        return $this->returnDataMultiArray('Result Check',$sub_disease,'Vezzeta Doctors',$VezzetaDoctors);
                    }
                }else{
                    if(App::getLocale()=="en"){
                        $VezzetaDoctors = $Doctors->GetDoctorEnglish($location_country,'neurology');
                        $sub_disease->setAttribute('Total_Vezzeta_Doctors',count($VezzetaDoctors));
                        return $this->returnDataMultiArray('Result Check',$sub_disease,'Vezzeta Doctors',$VezzetaDoctors);
                    }else{
                        $VezzetaDoctors = $Doctors->GetDoctorArabic($location_country,'مخ-واعصاب');
                        $sub_disease->setAttribute('Total_Vezzeta_Doctors',count($VezzetaDoctors));
                        return $this->returnDataMultiArray('Result Check',$sub_disease,'Vezzeta Doctors',$VezzetaDoctors);
                    }
                }
            }else{
                return $this->returnError('E500', 'Please login to your account');
                // check login student
            }      
        // }catch (\Exception $ex) {
        //     return $this->returnError($ex->getCode(), $ex->getMessage());
        // }    
    }
}
