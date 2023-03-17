<?php

namespace App\Http\Controllers\API\Patient;

use App\Models\Patient;
use Illuminate\Http\Request;
use App\Http\Traits\ResponseTrait;
use App\Http\Controllers\Controller;
use App\Http\Traits\PatientAuthTrait;
use App\Models\PatientVerify;

class PatientForgetPassword extends Controller
{
    use ResponseTrait; // for Response the JSON
    use PatientAuthTrait; // Foe handling the functions that for patient auth

    public function SendOTPForgetPassword(Request $request){

        $patient_id = Patient::where('email',$request->email)->first();
        $patient_id = $patient_id->id;
        $this->CreateOTPSendIt($patient_id,$request);
        return $this->returnSuccessMessage(__('auth.the_mail_has_been_sent'),'S000');
    }
    public function CheckOTP(Request $request){
        $email= $request->email;
        $OTP = $request->OTP;
        $IsOTPCorrect = PatientVerify::with(["patient" => function($q) use ($email){
            $q->where('patient.email', '=', $email);
        }])->where('Token',$OTP)->first();
        if($IsOTPCorrect){
            $IsOTPCorrect->delete();
            return $this->returnSuccessMessage(__('auth.OTP_is_correct'));
        }else{
            return $this->returnError('E2524',__('auth.OTP_is_incorrect'));
        }

    }

    public function ForgetPassword(Request $request){
        $email= $request->email;
        $Patient= Patient::where('email',$email)->first();
        $rules = $request->validate([
            'password' => 'required|min:6|confirmed',
        ]);
        $data = [
            'password' =>bcrypt($request->password)
        ];
        $this->ReturnValidate($data,$rules);
        $Patient->update($data);
        return $this->returnSuccessMessage(__('auth.the_password_has_been_changed_successfully'));
    }

    public function ResendOTPMail(Request $request){
        $patient_id = Patient::where('email',$request->email)->first();
        PatientVerify::where('patient_id',$patient_id)->first()->delete();
        $this->CreateOTPSendIt($patient_id,$request);
        return $this->returnSuccessMessage(__('auth.the_mail_has_been_sent'),'S000');
    }
    
}
