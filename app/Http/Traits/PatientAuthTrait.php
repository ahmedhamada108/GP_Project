<?php

namespace App\Http\Traits;

use App\Models\Patient;
use Illuminate\Support\Str;
use App\Models\PatientVerify;
use App\Http\Traits\ResponseTrait;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

trait PatientAuthTrait
{
    use ResponseTrait;
    private function ReturnValidate($request,$rules){
        return
          $validator = Validator::make($request, $rules);
          if ($validator->fails()) {
            $code = $this->returnCodeAccordingToInput($validator);
            
            return $this->returnValidationError($code, $validator);
        }
    }
    private function create_patient(array $data)
    {
      return Patient::create([
        'id'=> $data['id'],
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => $data['password']
      ]);
    }
    private function CreateOTPSendIt($id,$request){
        $token = random_int(10000,99999);
        $is_exists = PatientVerify::where('Token',$token)->first();
        if(!$is_exists){
          PatientVerify::create([
            'patient_id' => $id, 
            'Token' => $token
          ]);
          Mail::send('email.emailVerificationOTP', ['token' => $token], function($message) use($request){
                $message->to($request->email);
                $message->subject('Email Verification Mail');
          });
        }else{
          return $this->returnError('E2424',__('auth.please_try_again'));
        }
    }

    private function CreateTokenSendIt($id,$request){
      $token = Str::random(64);
      
      PatientVerify::create([
            'patient_id' => $id, 
            'Token' => $token
          ]);
      Mail::send('email.emailVerificationEmail', ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject('Email Verification Mail');
        });
  }
}
