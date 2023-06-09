<?php

use App\Http\Controllers\API\Diseases\Alzahimar_Disease;
use App\Http\Controllers\API\Diseases\Brain_Stroke_Disease;
use App\Http\Controllers\API\Diseases\OCT_Disease;
use App\Http\Controllers\API\Diseases\XRay_Disease;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Patient\Auth_Patient;
use App\Http\Controllers\API\Patient\PatientForgetPassword;
use App\Http\Controllers\API\Patient\PatientHistoryController;
use App\Http\Controllers\API\Patient\AccountController;
use App\Http\Controllers\API\Patient\VezeetaScraping;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group(['middleware'=>['change.lang']], function(Router $router) 
{

    Route::post('register_patient', [Auth_Patient::class,'postRegistration']);
    Route::post('logout_patient', [Auth_Patient::class,'logout']);
    Route::post('login_patient', [Auth_Patient::class,'postLogin']);
    Route::post('ResendVerifyMail', [Auth_Patient::class,'ResendVerifyMail']);
    
    Route::post('SendOTPForgetPassword', [PatientForgetPassword::class,'SendOTPForgetPassword']);
    Route::post('CheckOTP', [PatientForgetPassword::class,'CheckOTP']);
    Route::post('ForgetPassword', [PatientForgetPassword::class,'ForgetPassword']);
    Route::post('ResendOTPMail', [PatientForgetPassword::class,'ResendOTPMail']);

    Route::post('alzahimar', [Alzahimar_Disease::class,'SendAlzahimar']);
    Route::post('OCT', [OCT_Disease::class,'SendOCT']);
    Route::post('BrainStroke', [Brain_Stroke_Disease::class,'SendBrainStroke']);
    Route::post('Chest_XRay', [XRay_Disease::class,'SendXRay']);

    Route::post('GetDoctorEnglish', [VezeetaScraping::class,'GetDoctorEnglish']);
    Route::post('GetDoctorArabic', [VezeetaScraping::class,'GetDoctorArabic']);
    Route::get('PatientHistory', [PatientHistoryController::class,'PatientHistory']);
    Route::post('UpdateAccount', [AccountController::class,'UpdateAccount']);
    Route::get('ViewInfoAccount', [AccountController::class,'ViewAccount']);
    Route::post('UpdateImageAccount',[AccountController::class,'UpdateImageAccount']);
    Route::Delete('DeleteHistory', [PatientHistoryController::class,'DeleteHistory']);


});
Route::get('account/verify/{token}', [Auth_Patient::class, 'verifyAccount'])->name('user.verify');
