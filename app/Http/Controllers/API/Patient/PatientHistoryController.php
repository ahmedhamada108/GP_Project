<?php

namespace App\Http\Controllers\API\Patient;

use App\Http\Controllers\Controller;
use App\Http\Traits\ResponseTrait;
use App\Models\history;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Barryvdh\DomPDF\Facade\PDF;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PatientHistoryController extends Controller
{
    //
    use ResponseTrait;
    public function PatientHistory(){
        try{
            if(auth('patient-api')->id() != null){
                $patient_id = auth('patient-api')->id();
                $history_object = new history();
                $history = $history_object->GetPatientHistory($patient_id);
                 $history = $history->map(function ($item) {
                    $item->disease_name = $item->disease->disease_name;
                    $item->sub_disease_name = $item->sub_disease->Sub_disease_name;
                    $item->image = env('APP_URL').$item->image;
                    $item->check_date = $item->created_at->format('Y.m.d g:i A');
                    $item->description = $item->sub_disease->description_en;
                    unset($item->disease);
                    unset($item->sub_disease);
                    unset($item->disease_id);
                    unset($item->sub_disease_id);

                    // Get PDF fro every History 
                    $AppUrlQr = QrCode::size(300)->generate(env('APP_URL'));
                    $RayImageQr = QrCode::size(300)->generate($item->image);
                    $PDF_Data= [
                        'patient_id' => auth('patient-api')->id(),
                        'patient_name' => auth('patient-api')->user()->name,
                        'patient_email' => auth('patient-api')->user()->email,
                        'disease'=> $item->disease_name,

                        'sub_disease'=> $item->sub_disease_name,
                        'description' => $item->description,
                        'AppUrlQR' => $AppUrlQr,
                        'RayImageQr' => $RayImageQr,
                        'check_date' => $item->check_date
                    ];
                    $pdf = PDF::loadView('welcome',$PDF_Data);
                    $pdf->setPaper('A4', 'portrait');
                    $output = $pdf->output();
                    // Save the PDF to a file
                    $filename = 'patient-' . auth('patient-api')->id() . $item->id . '.pdf';
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
                return $this->returnData("Patient History",$history);
            }else{
                return $this->returnError('E500', 'Please login to your account');
                // check login student
            }      
        }catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        } 
    }

    public function DeleteHistory(Request $request){
        try{
            if(auth('patient-api')->id() != null){

                $request->validate([
                    'IDs' =>'required|array',
                    'IDs.*' => 'integer'
                ]);
                history::whereIn('id', $request->IDs)->delete();
                foreach($request->IDs as $id){
                    $filename = 'patient-' . auth('patient-api')->id() . $id . '.pdf';
                    File::delete(storage_path('app/public/PatientsPDF/' . $filename));
                }
                return $this->returnSuccessMessage('The History Items have been deleted successfully');
            }else{
                return $this->returnError('E500', 'Please login to your account');
                // check login student
            }      
        }catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        } 
    }
}
