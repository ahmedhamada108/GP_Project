<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Traits\PatientAuthTrait;
use Illuminate\Http\Request;
use App\Models\PatientVerify;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\history;
use App\Models\Patient;

class AuthController extends Controller
{
    //
    use PatientAuthTrait;
    public function login_view(){
        return view('AdminPanel.login');
    }
    public function postLoginAdmin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required|min:6',
        ]);
        $credentials = $request->only('email', 'password');
        if (auth('admin')->attempt($credentials)) {

            return redirect()->route('admin_dashboard');
            // end login admin logic 
        }else{
            session()->flash('error','Oppes! You have entered invalid credentials');
            return redirect()->route('admin_login');
        }
    }// end post login func
    public function dashboard(){
        $patients = Patient::count();
        $diagnoses = history::count();
        $admins = Admin::count();
        return view('AdminPanel.dashboard',compact(['patients','diagnoses','admins']));
    }

    public function logout()
    {
        auth('admin')->logout();
        return redirect()->route('admin_login');
    }// end logout func
    public function DarkLight(Request $request){
        $mode = $request->input('mode');
        if ($mode === 'dark') {
            session(['mode' => 'dark']);
        } else {
            session(['mode' => 'light']);
        }

        return redirect()->back();
    }
}
