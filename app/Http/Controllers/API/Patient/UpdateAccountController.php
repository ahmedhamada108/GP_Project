<?php

namespace App\Http\Controllers\API\Patient;

use Illuminate\Http\Request;
use App\Http\Traits\ResponseTrait;
use App\Http\Controllers\Controller;
use App\Http\Traits\PatientAuthTrait;

class UpdateAccountController extends Controller
{
    //
    use ResponseTrait, PatientAuthTrait;
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
                return $this->returnSuccessMessage("His Aaccount info has been changed");
            }else{
                return $this->returnError('E500', 'Please login to your account');
                // check login student
            }      
        }catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        } 
    }
}
