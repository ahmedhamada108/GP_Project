<?php

namespace App\Http\Controllers\API\Diseases;

use App\Models\history;
use App\Models\Diseases;
use Illuminate\Http\Request;
use App\Http\Traits\ResponseTrait;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Http\Traits\Long_LatRequest;
use App\Http\Traits\VezeetaScraping;
use App\Models\SubDiseasesDescription;
use App\Http\Traits\RequestModelsTrait;

class Brain_Stroke_Disease extends Controller
{
    //
    use RequestModelsTrait, ResponseTrait, Long_LatRequest;
    public function SendBrainStroke(Request $request){
        try{
            if(auth('patient-api')->id() != null){
                $data = $request->validate([
                    'image' => 'required|image'
                ]);
                $file_extension = $request->image->getClientOriginalExtension();
                $img_name = time() . '.' . $file_extension;
                $path = storage_path('app/public/BrainStrokeImages');
                $request->image->move($path, $img_name);
                $data['image']= '/storage/BrainStrokeImages/'.$img_name;
                $model_url = "http://185.38.148.55/Stroke_Brain_Model";
                $storage_filename = "BrainStrokeImages";
                $imagename= "1679557078.jpg";
                $result = $this->RequestModel($model_url,$storage_filename,$img_name);
                $result_value = $result['Result'];
                $disease = Diseases::select(
                        'id',
                        'diseases_name_'.app()->getLocale().' as disease_name'
                    )->where('diseases_name_en','Brain Stroke')->first();

                $sub_disease = SubDiseasesDescription::select(
                        'id',
                        'sub_disease_'.app()->getLocale().' as sub_disease',
                        'description_'.app()->getLocale().' as description'
                    )->where('sub_disease_en','LIKE','%'.$result_value.'%')->first();
                history::create([
                    'patient_id' => auth('patient-api')->id(),
                    'disease_id' => $disease->id,
                    'sub_disease_id' => $sub_disease->id,
                    'image' => $data['image']
                ]);
                $location_country = $this->LocationRequest($request->long,$request->lat);
                $Doctors = new VezeetaScraping();
                if($sub_disease->sub_disease == 'Normal' || $sub_disease->sub_disease == 'طبيعي'){
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
                        $VezzetaDoctors = $Doctors->GetDoctorEnglish($location_country,'neurology');;
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
        }catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }    
    }
}
