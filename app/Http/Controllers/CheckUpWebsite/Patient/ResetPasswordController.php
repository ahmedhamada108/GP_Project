<?php

namespace App\Http\Controllers\CheckUpWebsite\Patient;

use App\Models\Patient;
use App\Models\settings;
use Illuminate\Http\Request;
use App\Models\PatientVerify;
use App\Http\Controllers\Controller;
use App\Http\Traits\PatientAuthTrait;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class ResetPasswordController extends Controller
{
    //
    use PatientAuthTrait; // Foe handling the functions that for patient auth

    public function ResetPasswordView(){
        $settings = settings::select(
            'facebook_url',
            'twiiter_url',
            'linkedin_url',
            'google_url',
            'location',
            'email',
            'phone',
            'website_description_'.LaravelLocalization::getCurrentLocale().' as website_description',
            'about_us_'.LaravelLocalization::getCurrentLocale().' as about_us',

            )->find(1);
        return view('checkup.reset_password_email',compact('settings'));
    }
    public function ResetPasswordOTPView(){
        $settings = settings::select(
            'facebook_url',
            'twiiter_url',
            'linkedin_url',
            'google_url',
            'location',
            'email',
            'phone',
            'website_description_'.LaravelLocalization::getCurrentLocale().' as website_description',
            'about_us_'.LaravelLocalization::getCurrentLocale().' as about_us',

            )->find(1);
        return view('checkup.reset_password_otp',compact('settings'));
    }
    public function ResetPasswordChnageView(){
        $settings = settings::select(
            'facebook_url',
            'twiiter_url',
            'linkedin_url',
            'google_url',
            'location',
            'email',
            'phone',
            'website_description_'.LaravelLocalization::getCurrentLocale().' as website_description',
            'about_us_'.LaravelLocalization::getCurrentLocale().' as about_us',

            )->find(1);
        return view('checkup.reset_password_change',compact('settings'));

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
