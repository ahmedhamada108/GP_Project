<?php

namespace App\Http\Controllers\AdminPanel;

use App\Models\Diseases;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class MainDiseasesController extends Controller
{
    //
    public function DiseaseIndex(){
        $diseases = Diseases::select(
            'id',
            'diseases_name_'.LaravelLocalization::getCurrentLocale().' as disease_name',
            'diseases_name_en',
            'diseases_description_'.LaravelLocalization::getCurrentLocale(). ' as diseases_description',
            'image'
        )->get();
        $get_diseases = Diseases::all();
        return view('AdminPanel.Diseases.main_disease',compact(['diseases','get_diseases']));
    }

    public function CreateDisease(Request $request){
        $data = $request->validate([
            'diseases_name_ar'=> 'required',
            'diseases_description_en' => 'required',
            'diseases_name_en' => 'required',
            'diseases_description_ar'=> 'required',
            'image' => 'required'
        ]);
        if($request->has('image')){
            $file_extension = $request->image->getClientOriginalExtension();
            $img_name = time() . '.' . $file_extension;
            $path = storage_path('app/public/Diseases');
            $request->image->move($path, $img_name);
            $data['image'] = '/storage/Diseases/'.$img_name;
        }
        Diseases::create($data);
        session()->flash('success','New Main Disease has been added.');
        return redirect()->route('main_diseases');
    }

    public function UpdateDisease(Request $request, $disease_id){
       // Validate the request data
        $request->validate([
            'diseases_name_ar'=> 'required',
            'diseases_description_en' => 'required',
            'diseases_name_en' => 'required',
            'diseases_description_ar'=> 'required',
            'image' => 'sometimes',
        ]);

        // Get the disease to be updated
        $disease = Diseases::findOrFail($disease_id);
        // handle the data 
        $disease->diseases_name_ar = $request->diseases_name_ar;
        $disease->diseases_description_en = $request->diseases_description_en;
        $disease->diseases_name_en = $request->diseases_name_en;
        $disease->diseases_description_ar = $request->diseases_description_ar;

        // Handle the image upload
        if ($request->hasFile('image')) {
            File::delete(storage_path('app/public/Diseases/'.$$disease->image));
            $file_extension = $request->image->getClientOriginalExtension();
            $img_name = time() . '.' . $file_extension;
            $path = storage_path('app/public/Diseases');
            $request->image->move($path, $img_name);
            $disease->image = '/storage/Diseases/'.$img_name;
        }   
        // Save the updated disease details
        $disease->save();

        session()->flash('success','Editing Disease has been done.');
        return redirect()->route('main_diseases');

    }

    public function Destroy($disease_id){
        $disease = Diseases::find($disease_id);
        File::delete(storage_path('app/public/Diseases/'.$disease->image));
        // delete image from the storage path
        $disease->delete();
        session()->flash('success','Delete Disease has been done.');
        return redirect()->route('main_diseases');
    }
}
