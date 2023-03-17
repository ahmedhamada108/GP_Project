<?php

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Patient\Auth_Patient;
use App\Http\Controllers\API\Patient\PatientForgetPassword;

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
    Route::post('login_patient', [Auth_Patient::class,'postLogin']);
    Route::post('ResendVerifyMail', [Auth_Patient::class,'ResendVerifyMail']);
    
    Route::post('SendOTPForgetPassword', [PatientForgetPassword::class,'SendOTPForgetPassword']);
    Route::post('CheckOTP', [PatientForgetPassword::class,'CheckOTP']);
    Route::post('ForgetPassword', [PatientForgetPassword::class,'ForgetPassword']);
    Route::post('ResendOTPMail', [PatientForgetPassword::class,'ResendOTPMail']);

});
Route::get('account/verify/{token}', [Auth_Patient::class, 'verifyAccount'])->name('user.verify'); 
