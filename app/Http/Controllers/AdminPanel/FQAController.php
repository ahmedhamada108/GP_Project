<?php

namespace App\Http\Controllers\AdminPanel;

use App\Models\Diseases;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\FQA;
use Illuminate\Support\Facades\File;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class FQAController extends Controller
{
    //
    public function FQA_Index(){
        $FQAs = FQA::select(
            'id',
            'quest_'.LaravelLocalization::getCurrentLocale().' as quest',
            'answer_'.LaravelLocalization::getCurrentLocale(). ' as answer',
        )->get();
        $get_FQA = FQA::all();
        return view('AdminPanel.WebsiteSettings.FQA',compact(['FQAs','get_FQA']));
    }

    public function CreateFQA(Request $request){
        $data = $request->validate([
            'quest_ar'=> 'required',
            'quest_en' => 'required',
            'answer_ar' => 'required',
            'answer_en'=> 'required',
        ]);
        FQA::create($data);
        session()->flash('success','New FQA has been added.');
        return redirect()->route('fqa');
    }

    public function UpdateFQA(Request $request, $FQA_id){
       // Validate the request data
        $data = $request->validate([
            'quest_ar'=> 'required',
            'quest_en' => 'required',
            'answer_ar' => 'required',
            'answer_en'=> 'required',
        ]);
        // Get the disease to be updated
        
        FQA::findOrFail($FQA_id)->update($data);
        session()->flash('success','Editing FQA has been done.');
        return redirect()->route('fqa');

    }

    public function Destroy($FQA_id){
        FQA::find($FQA_id)->delete();
        session()->flash('success','Delete FQA has been done.');
        return redirect()->route('fqa');
    }
}
