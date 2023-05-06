<?php

namespace App\Http\Controllers\CheckupWebsite\Patient;

use App\Models\history;
use App\Models\settings;
use Illuminate\Http\Request;
use App\Models\PatientVerify;
use Carbon\Traits\Localization;
use App\Http\Controllers\Controller;
use App\Http\Traits\PatientAuthTrait;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Support\Facades\File;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class HistoryController extends Controller
{
    public function History_view(){
        $histories = history::with(
            ['disease','disease:id,diseases_name_'.LaravelLocalization::getCurrentLocale().' as disease_name',
            'sub_disease','sub_disease:id,sub_disease_'.LaravelLocalization::getCurrentLocale().' as Sub_disease_name,description_en'
            ])->where('patient_id',auth('patient')->id())->paginate(10);
            $perPage = 10;
            $page = request()->get('page', 1);
            $histories = $histories->map(function ($item) {
                $item->disease_name = $item->disease->disease_name;
                $item->sub_disease_name = $item->sub_disease->Sub_disease_name;
                $item->image = env('APP_URL').$item->image;
                $item->check_date = $item->created_at->format('Y.m.d g:i A');
                $item->description = $item->sub_disease->description_en;
                unset($item->sub_disease);
                unset($item->disease_id);
                unset($item->sub_disease_id);
                unset($item->disease);
                // return $item;
                // Get PDF fro every History 
                $AppUrlQr = QrCode::size(300)->generate(env('APP_URL'));
                $RayImageQr = QrCode::size(300)->generate($item->image);
                $PDF_Data= [
                    'patient_id' => auth('patient')->id(),
                    'patient_name' => auth('patient')->user()->name,
                    'patient_email' => auth('patient')->user()->email,
                    'disease'=> $item->disease_name,

                    'sub_disease'=> $item->sub_disease_name,
                    'description' => $item->description,
                    'AppUrlQR' => $AppUrlQr,
                    'RayImageQr' => $RayImageQr,
                    'check_date' => $item->check_date
                ];
                // return $PDF_Data;
                $pdf = PDF::loadView('welcome',$PDF_Data);
                $pdf->setPaper('A4', 'portrait');
                $output = $pdf->output();
                // Save the PDF to a file
                $filename = 'patient-' . auth('patient')->id() . $item->id . '.pdf';
                $filepath = storage_path('app/public/PatientsPDF/' . $filename);
                file_put_contents($filepath, $output);
                // Get the download URL
                $downloadUrl = url('/storage/PatientsPDF/' . $filename);
                $item->PDF_URL = $downloadUrl;

                return collect($item)->only([
                    'id',
                    'patient_id',
                    'image',
                    'disease_name',
                    'sub_disease_name',
                    'PDF_URL',
                    'check_date',
                ]);
            });
            $histories = new \Illuminate\Pagination\LengthAwarePaginator(
                $histories,
                $histories->count(),
                $perPage,
                $page,
                ['path' => request()->url(), 'query' => request()->query()]
            );
            // return $histories;

            $settings = settings::select(
                'facebook_url',
                'twiiter_url',
                'linkedin_url',
                'google_url',
                'location',
                'email',
                'phone',
                'website_description_'.LaravelLocalization::getCurrentLocale().' as website_description',
                'about_us_'.LaravelLocalization::getCurrentLocale().' as about_us',
    
                )->find(1);
        return view('checkup.history',compact(['histories','settings']));
    }

    public function DeleteHistory(Request $request){
        $request->validate([
            'IDs'=> 'required'
        ]);
        $ids = explode(',', $request->input('IDs')[0]); // returns [97, 98, 99, 100]

        history::whereIn('id', $ids)->delete();
                foreach($ids as $id){
                    $filename = 'patient-' . auth('patient-api')->id() . $id . '.pdf';
                    File::delete(storage_path('app/public/PatientsPDF/' . $filename));
                }
            session()->flash('success','Deleting the selected has been done.');
        return redirect()->route('history_view');
    }
}
