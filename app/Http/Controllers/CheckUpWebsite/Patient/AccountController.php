<?php

namespace App\Http\Controllers\CheckupWebsite\Patient;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Http\Traits\PatientAuthTrait;

class AccountController extends Controller
{
    use PatientAuthTrait;
    public function EditAccount(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'email' => ['required','email', Rule::unique('patient')->ignore(auth('patient')->id())],
            'password' => 'sometimes| min:6|confirmed',
            'image' => 'nullable',
        ]);
        if($request->has('image')){
            $file_extension = $request->image->getClientOriginalExtension();
            $img_name = time() . '.' . $file_extension;
            $path = storage_path('app/public/PatientsImages');
            $request->image->move($path, $img_name);
            $data['image'] = '/storage/PatientsImages/'.$img_name;
        }
        $this->Update_Patient(auth('patient')->id(),$data);
        session()->flash('success','');
        return redirect()->route('account_view');
    }
}
