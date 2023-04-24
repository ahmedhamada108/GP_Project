<?php

namespace App\Http\Controllers\AdminPanel;

use App\Models\Diseases;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SubDiseasesDescription;
use Illuminate\Support\Facades\File;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class SubDiseasesController extends Controller
{
    //
    public function SubDiseaseIndex(){
        $sub_diseases = SubDiseasesDescription::with([
            'diseases:id,diseases_name_'.LaravelLocalization::getCurrentLocale().' as main_disease'
            ])->select(
            'id',
            'disease_id',
            'sub_disease_'.LaravelLocalization::getCurrentLocale().' as sub_disease',
            'description_'.LaravelLocalization::getCurrentLocale().' as description'
        )->get();
        $get_sub_diseases = SubDiseasesDescription::with([
            'diseases'
            ])->get();
        $diseases = Diseases::select(
            'id',
            'diseases_name_'.LaravelLocalization::getCurrentLocale().' as disease_name'
        )->get();
        // return $sub_diseases;
        return view('AdminPanel.Diseases.sub_disease',compact(['sub_diseases','diseases','get_sub_diseases']));
    }

    public function CreateSubDisease(Request $request){
        $data = $request->validate([
            'sub_disease_ar'=> 'required',
            'sub_disease_en' => 'required',
            'description_ar' => 'required',
            'description_en'=> 'required',
            'disease_id' => 'required'
        ]);
        SubDiseasesDescription::create($data);
        session()->flash('success','New Sub Disease has been added.');
        return redirect()->route('sub_diseases');
    }

    public function UpdateSubDisease(Request $request, $sub_disease_id){
       // Validate the request data
        $data = $request->validate([
            'sub_disease_ar'=> 'required',
            'sub_disease_en' => 'required',
            'description_ar' => 'required',
            'description_en'=> 'required',
            'disease_id' => 'required'
        ]);
        // Get the disease and update it
        SubDiseasesDescription::findOrFail($sub_disease_id)->update($data);

        session()->flash('success','Editing Sub Disease has been done.');
        return redirect()->route('sub_diseases');

    }

    public function Destroy($sub_disease_id){
        SubDiseasesDescription::find($sub_disease_id)->delete();
        session()->flash('success','Delete Sub Disease has been done.');
        return redirect()->route('sub_diseases');
    }
}
