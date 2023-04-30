<?php

namespace App\Http\Controllers\AdminPanel;

use App\Models\Admin;
use App\Models\Diseases;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Traits\PatientAuthTrait;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class AdminsManagementController extends Controller
{
    // 
    public function AdminsManagement(){

        $admins = Admin::all();
        // return $patients;
        return view('AdminPanel.Admins.admins',compact(['admins']));
    }

    public function CreateAdmin(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email |unique:admins',
            'password' => 'required|min:6|confirmed',
        ]);
        $data += [
            'password' =>bcrypt($request->password)
        ];
        
        Admin::create($data);
        session()->flash('success','New Admin has been added.');
        return redirect()->route('admins');
    }

    public function UpdateAdmin(Request $request, $admin_id){
       // Validate the request data
        $request->validate([
            'name' => 'required',
            'email' => ['required','email', Rule::unique('admins')->ignore($admin_id)],
            'password' => 'sometimes| confirmed',
        ]);
        $data = [
            'name' => $request->name,
            'email' => $request->email
        ];
        $admin = Admin::where('id', $admin_id)->firstOrFail();
        if (isset($request->password)) {
            $data += [
                'password' =>bcrypt($request->password)
            ];
        }
        $admin->update($data);
        session()->flash('success','Editing Admin has been done.');
        return redirect()->route('admins');

    }

    public function Destroy($admin_id){
        $admin = Admin::find($admin_id)->delete();
        session()->flash('success','Delete Admin has been done.');
        return redirect()->route('admins');
    }
}
