<?php

namespace App\Http\Traits;

use App\Models\history;
use App\Models\Diseases;
use Illuminate\Http\Request;
use App\Models\SubDiseasesDescription;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

trait RequestModelsWeb
{
    public function SendRequestModel(Request $request,array $data_func){
                $data = $request->validate([
                    'image' => 'required|image'
                ]);
                $file_extension = $request->image->getClientOriginalExtension();
                $img_name = time() . '.' . $file_extension;
                $path = storage_path('app/public/'.$data_func['filename_storage']);
                $request->image->move($path, $img_name);
                $data['image']= '/storage/'.$data_func['filename_storage'].'/'.$img_name;
                $model_url = $data_func['external_api'];
                $storage_filename = $data_func['filename_storage'];
                $img ='1681276309.jpg';
                $result = $this->RequestModel($model_url,$storage_filename,$img);
                $result_value = $result['Result'];
                $disease = Diseases::select(
                        'id',
                        'diseases_name_'.LaravelLocalization::getCurrentLocale().' as disease_name'
                    )->where('diseases_name_en',$data_func['disease'])->first();

                $sub_disease = SubDiseasesDescription::select(
                        'id',
                        'sub_disease_'.LaravelLocalization::getCurrentLocale().' as sub_disease',
                        'description_'.LaravelLocalization::getCurrentLocale().' as description'
                    )->where('sub_disease_en',$result_value)->first();
                $history = history::create([
                    'patient_id' => auth('patient')->id(),
                    'disease_id' => $disease->id,
                    'sub_disease_id' => $sub_disease->id,
                    'image' => $data['image']
                ]);
                $Doctors = new VezeetaScraping();
                if($result_value == "Non Dementia" || $result_value == 'Normal'){
                    if(LaravelLocalization::getCurrentLocale()=="en"){
                        $VezzetaDoctors = null;
                        // return $sub_disease;
                        return view('checkup.result',compact(['sub_disease','VezzetaDoctors']));
                    }else{
                        $VezzetaDoctors = null;
                        // return $sub_disease;
                        return view('checkup.result',compact(['sub_disease','VezzetaDoctors']));
                    }
                }else{
                    if(LaravelLocalization::getCurrentLocale()=="en"){
                        $VezzetaDoctors = $Doctors->GetDoctorEnglish($request->city_patient,$data_func['specialization_en']);

                        return view('checkup.result',compact(['sub_disease','VezzetaDoctors']));
                    }else{
                        $VezzetaDoctors = $Doctors->GetDoctorArabic($request->city_patient,$data_func['specialization_en']);
                        
                        return view('checkup.result',compact(['sub_disease','VezzetaDoctors']));
                    }
                }      
    }

}
