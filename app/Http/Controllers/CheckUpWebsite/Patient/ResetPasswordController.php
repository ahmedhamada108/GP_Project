<?php

namespace App\Http\Controllers\CheckUpWebsite\Patient;

use App\Models\Patient;
use Illuminate\Http\Request;
use App\Models\PatientVerify;
use App\Http\Controllers\Controller;
use App\Http\Traits\PatientAuthTrait;

class ResetPasswordController extends Controller
{
    //
    use PatientAuthTrait; // Foe handling the functions that for patient auth

    public function ResetPasswordView(){
        return view('checkup.reset_password_email');
    }
    public function ResetPasswordOTPView(){
        return view('checkup.reset_password_otp');
    }
    public function ResetPasswordChnageView(){
        return view('checkup.reset_password_change');

    }
    public function SendOTPForgetPassword(Request $request){
        $request->validate([
            'email' => 'required|email|exists:patient,email',
        ]);
        $patient_id = Patient::where('email',$request->email)->first();
        $patient_id = $patient_id->id;
        $this->CreateOTPSendIt($patient_id,$request);
        session()->put('email_patient',$request->email);
        return redirect()->route('OTP');
    }
    public function CheckOTP(Request $request){
        $request->validate([
            'otp' => 'required',
        ]);        
        $email= session()->get('email_patient');
        $OTP = implode('', $request->otp);
        $IsOTPCorrect = PatientVerify::with(["patient" => function($q) use ($email){
            $q->where('patient.email', '=', $email);
        }])->where('Token',$OTP)->first();
        if($IsOTPCorrect){
            $IsOTPCorrect->delete();
            return redirect()->route('chnage_password');

        }else{
            session()->flash('error','OTP is Incorrect.');
            return redirect()->route('OTP');

        }

    }

    public function ForgetPassword(Request $request){
        $email= session()->get('email_patient');
        $Patient= Patient::where('email',$email)->first();
        $rules = $request->validate([
            'password' => 'required|min:6|confirmed',
        ]);
        $data = [
            'password' =>bcrypt($request->password)
        ];
        $Patient->update($data);
        session()->flash('success','The Password has been changed.');
        return redirect()->route('home');
    }
}
