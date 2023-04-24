<?php

namespace App\Http\Controllers\AdminPanel;

use App\Models\Diseases;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\FQA;
use App\Models\settings;
use Illuminate\Support\Facades\File;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class SettingsController extends Controller
{
    //
    public function settings_index(){
        $settings = settings::find(1);
        return view('AdminPanel.WebsiteSettings.settings',compact('settings'));
    }



    public function UpdateSettings(Request $request,$id){
       // Validate the request data
        $data = $request->validate([
            'facebook_url' => 'required',
            'twiiter_url' => 'required',
            'linkedin_url' => 'required',
            'google_url' => 'required',
            'location' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'website_description_ar' => 'required',
            'website_description_en' => 'required',
            'about_us_ar' => 'required',
            'about_us_en' => 'required',
        ]);
        settings::findOrFail($id)->update($data);
        session()->flash('success','Editing Settings has been done.');
        return redirect()->route('settings');
    }

    public function Destroy($FQA_id){
        FQA::find($FQA_id)->delete();
        session()->flash('success','Delete FQA has been done.');
        return redirect()->route('fqa');
    }
}
