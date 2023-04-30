<?php

namespace App\Http\Controllers\API\Patient;

use Illuminate\Http\Request;
use App\Http\Traits\ResponseTrait;
use App\Http\Controllers\Controller;
use App\Http\Traits\PatientAuthTrait;
use App\Models\Patient;

class AccountController extends Controller
{
    //
    use ResponseTrait, PatientAuthTrait;
    public function ViewAccount(){
        try{
            if(auth('patient-api')->id() != null){
                $patient = Patient::find(auth('patient-api')->id());
                if($patient){
                    $patient->image = ($patient->image == "https://placehold.co/80x80?text=user+image") ? "https://placehold.co/80x80?text=user+image" : env('APP_URL').$patient->image;
                    unset($patient->is_email_verified);
                }
                return $this->returnData("Account Info",$patient);
            }else{
                return $this->returnError('E500', 'Please login to your account');
                // check login student
            }      
        }catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }
    }
    public function UpdateAccount(Request $request){
        try{
            if(auth('patient-api')->id() != null){
                $rules = $request->validate([
                    'name'=> 'min:6',
                    'email' => 'email |unique:patient',
                    'password' => 'min:6|confirmed',
                    'image' => 'image'
                ]);
                $data = [
                    'name'=>$request->name,
                    'email'=>$request->email,
                    'password' =>bcrypt($request->password),
                ];
                if($request->hasFile('image')){
                    $file_extension = $request->image->getClientOriginalExtension();
                    $img_name = time() . '.' . $file_extension;
                    $path = storage_path('app/public/PatientsImages');
                    $request->image->move($path, $img_name);
                    $data['image'] = '/storage/PatientsImages/'.$img_name;
                }
                // validate the data
                $this->ReturnValidate($data,$rules);
                // update the account
                $this->Update_Patient(auth('patient-api')->id(),$data);
                return $this->returnSuccessMessage("You Aaccount info has been changed");
            }else{
                return $this->returnError('E500', 'Please login to your account');
                // check login student
            }      
        }catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        } 
    }
}
