<?php

namespace App\Http\Controllers\API\Patient;

use App\Models\Patient;
use Illuminate\Http\Request;
use App\Models\PatientVerify;
use App\Http\Traits\ResponseTrait;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Http\Traits\PatientAuthTrait;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class Auth_Patient extends Controller
{
    use ResponseTrait; // for Response the JSON
    use PatientAuthTrait; // Foe handling the functions that for patient auth

    public function verifyAccount($token)
    {
        $verifyPatient = PatientVerify::where('Token', $token)->first();
  
        $message = 'Sorry your email cannot be identified.';
  
        if(!is_null($verifyPatient) ){
            $patient = $verifyPatient->patient;
              
            if(!$patient->is_email_verified) {
                $verifyPatient->patient->is_email_verified = 1;
                $verifyPatient->patient->save();
                $message = "Your e-mail is verified. You can now login.";
                $verifyPatient->delete();
            } else {
                $message = "Your e-mail is already verified. You can now login.";
            }
        }else{
            $message = "The Token is invalid";

        }
  
      return $message;
    }
    public function postRegistration(Request $request)
    {
        $rules = $request->validate([
            'name' => 'required',
            'email' => 'required|email |unique:patient',
            'password' => 'required|min:6|confirmed',
        ]);
        $data = [
            'id' => time(),
            'name'=>$request->name,
            'email'=>$request->email,
            'password' =>bcrypt($request->password)
        ];
        // validate the data
        $this->ReturnValidate($data,$rules);
        // record the user in the DB
        $this->create_patient($data);
        // Crate the verification token and send it by email
        $this->CreateTokenSendIt($data['id'],$request);

        return $this->returnSuccessMessage('A confirmation email has been sent to your email. Please verify your account now.');
    }

    public function postLogin(Request $request){
        try {
            
            $rules = [
                'email' => "required | exists:patient,email",
                'password' => "required"
            ];
            $data = [
                'email' => $request->email,
                'password'=> bcrypt($request->password)
            ];
            $this->ReturnValidate($data,$rules);
            /// login code wise
            $credentials = $request->only(['email', 'password']);
            $token = auth('patient-api')->attempt($credentials);
            if (!$token) {
                $validator = Validator::make($data, $rules);
                if ($validator->fails()) {
                    $code = $this->returnCodeAccordingToInput($validator);
                    return $this->returnError($code,$validator->errors()->first());
                }
                return $this->returnError('E4008',__('auth.Password_is_Incorrect') );
            } else {
                //return token 
                $patient = auth('patient-api')->user();
                $patient->Token = $token;
                if ($patient->is_email_verified == 0) {
                    JWTAuth::setToken($token)->invalidate();
                    return $this->returnError('E2422', __('auth.Please_Confirm_your_account'));
                    // return request pending message 
                } else {
                    $patient = [
                        'id' =>  $patient->id,
                        'name' => $patient->name,
                        'email' => $patient->email,
                        'token' => $patient->Token,
                    ];
                    // filter the response  
                    
                    return $this->returnData('Patient', $patient, __('auth.login_success'));
                }
            }
        } catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }
    }

    public function ResendVerifyMail(Request $request){
        $patient_id = Patient::where('email',$request->email)->first();
        if($patient_id->is_email_verified == 1){
            return $this->returnError('E5324',__('auth.your_account_is_already_activated'));
        }else{
            $patient_id = $patient_id->id;
            $this->CreateTokenSendIt($patient_id,$request);
            return $this->returnSuccessMessage(__('auth.the_mail_has_been_sent'),'S000');
        }
    }
    public function logout(Request $request)
    {
        try {
            $token = $request->bearerToken();
            if ($token) {
                JWTAuth::setToken($token)->invalidate();
                return $this->returnSuccessMessage(__('auth.Logout_successfully'));
            }else {
                return $this->returnError('E500', 'Token invalid');
            }
        } catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }

    }

    public function ChangeLanguage(Request $request){
        try{
            if($request->lang === 'ar'){
                app()->setLocale('ar');
            }else{
                app()->setLocale('en');
            }
            return $this->returnSuccessMessage("done");    
        }catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        } 

    }
}
