<?php

namespace App\Http\Controllers\AdminPanel;

use App\Models\Patient;
use App\Models\Diseases;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Traits\PatientAuthTrait;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class PatientsManagementController extends Controller
{
    // 
    use PatientAuthTrait;
    public function PatientsManagement(){

        $patients = Patient::all();
        // return $patients;
        return view('AdminPanel.Patients.patients',compact(['patients']));
    }

    public function CreatePatient(Request $request){
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
        if($request->has('image')){
            $file_extension = $request->image->getClientOriginalExtension();
            $img_name = time() . '.' . $file_extension;
            $path = storage_path('app/public/PatientsImages');
            $request->image->move($path, $img_name);
            $data['image'] = '/storage/PatientsImages/'.$img_name;
        }
        
        Patient::create($data);
        session()->flash('success','New Patient has been added.');
        return redirect()->route('patients');
    }

    public function UpdatePatient(Request $request, $patient_id){
       // Validate the request data
        $data = $request->validate([
            'name' => 'required',
            'email' => ['required','email', Rule::unique('patient')->ignore($patient_id)],
            'password' => 'sometimes| confirmed',
            'image' => 'nullable',
        ]);

        if($request->has('image')){
            $file_extension = $request->image->getClientOriginalExtension();
            $img_name = time() . '.' . $file_extension;
            $path = storage_path('app/public/PatientsImages');
            $request->image->move($path, $img_name);
            $data['image'] = '/storage/PatientsImages/'.$img_name;
        }
        $this->Update_Patient($patient_id,$data);

        session()->flash('success','Editing Patient has been done.');
        return redirect()->route('patients');

    }

    public function Destroy($patient_id){
        $patient = Patient::find($patient_id);
        File::delete(storage_path('app/public/PatientsImages/'.$patient->image));
        // delete image from the storage path
        $patient->delete();
        session()->flash('success','Delete Patient has been done.');
        return redirect()->route('patients');
    }
}
