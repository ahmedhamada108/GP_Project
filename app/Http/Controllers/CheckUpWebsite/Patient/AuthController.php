<?php

namespace App\Http\Controllers\CheckupWebsite\Patient;

use App\Http\Traits\PatientAuthTrait;
use Illuminate\Http\Request;
use App\Models\PatientVerify;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    //
    use PatientAuthTrait;
    public function SignUp_view(){
        return view('checkup.signup');
    }
    public function login_view(){
        return view('checkup.login');
    }

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
        $data = $request->validate([
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
        // record the user in the DB
        $this->create_patient($data);
        // Crate the verification token and send it by email
        $this->CreateTokenSendIt($data['id'],$request);

        session()->flash('success','A confirmation email has been sent to your email. Please verify your account now.');
        return redirect()->route('signup');
    }

    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required|min:6',
        ]);
        $credentials = $request->only('email', 'password');
        if (auth('patient')->attempt($credentials)) {

            return redirect()->route('account_view');
            // end login admin logic 
        }else{
            session()->flash('error','Oppes! You have entered invalid credentials');
            return redirect()->route('login');
        }
    }// end post login func

    public function account_view(){
        return view('checkup.account');
    }
    public function logout()
    {
        auth('patient')->logout();
        return redirect()->route('login');
    }// end logout func
}
