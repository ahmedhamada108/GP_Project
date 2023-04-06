<?php

namespace App\Http\Controllers\API\Diseases;

use App\Models\history;
use App\Models\Diseases;
use Illuminate\Http\Request;
use App\Http\Traits\ResponseTrait;
use App\Http\Controllers\Controller;
use App\Models\SubDiseasesDescription;
use App\Http\Traits\RequestModelsTrait;

class OCT_Disease extends Controller
{
    //
    use RequestModelsTrait, ResponseTrait;
    public function SendOCT(Request $request){
        try{
            if(auth('patient-api')->id() != null){
                $data = $request->validate([
                    'image' => 'required|image'
                ]);
                $file_extension = $request->image->getClientOriginalExtension();
                $img_name = time() . '.' . $file_extension;
                $path = storage_path('app/public/OCTImages');
                $request->image->move($path, $img_name);
                $data['image']= '/storage/OCTImages/'.$img_name;
                $model_url = "http://185.38.148.55/OCT_model";
                $storage_filename = "OCTImages";
                $imagename= "1679557078.jpg";
                $result = $this->RequestModel($model_url,$storage_filename,$imagename);
                $result_value = $result['Result'];
                $disease = Diseases::select(
                        'id',
                        'diseases_name_'.app()->getLocale().' as disease_name',
                    )->where('diseases_name_en','Retinal OCT Diseases')->first();

                $sub_disease = SubDiseasesDescription::select(
                        'id',
                        'sub_disease_'.app()->getLocale().' as sub_disease',
                        'description_'.app()->getLocale().' as description'
                    )->where('sub_disease_en',$result_value)->first();
                $history = history::create([
                    'patient_id' => auth('patient-api')->id(),
                    'disease_id' => $disease->id,
                    'sub_disease_id' => $sub_disease->id,
                    'image' => $data['image']
                ]);
                return $this->returnData('Result Check',$sub_disease);
            }else{
                return $this->returnError('E500', 'Please login to your account');
                // check login student
            }      
        }catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }    
    }
}
