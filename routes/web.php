<?php

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Patient\Auth_Patient;
use App\Http\Controllers\CheckUpWebsite\HomeController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\CheckupWebsite\Patient\AuthController;
use App\Http\Controllers\CheckUpWebsite\SingleDiseaseController;
use App\Http\Controllers\CheckupWebsite\Patient\AccountController;
use App\Http\Controllers\CheckupWebsite\Patient\HistoryController;
use App\Http\Controllers\CheckUpWebsite\Diseases\DiseasesModelsHanlding;
use App\Http\Controllers\CheckUpWebsite\Patient\ResetPasswordController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware'=>['change.lang']], function(Router $router) 
{
    Route::get('/', [HomeController::class,'index_view'])->name('home');
    Route::get('/login', [AuthController::class,'login_view'])->name('login');
    Route::get('/SignUp', [AuthController::class,'SignUp_view'])->name('signup');
    Route::post('/postRegistration', [AuthController::class,'postRegistration'])->name('post_signup');
    Route::post('/postLogin', [AuthController::class,'postLogin'])->name('post_signin');
    Route::get('/ResetPassword', [ResetPasswordController::class,'ResetPasswordView'])->name('reset_password');
    Route::get('/OTPConfirmation', [ResetPasswordController::class,'ResetPasswordOTPView'])->name('OTP');
    Route::get('/ChangePassword', [ResetPasswordController::class,'ResetPasswordChnageView'])->name('chnage_password');
    Route::post('/SendOTP', [ResetPasswordController::class,'SendOTPForgetPassword'])->name('send_otp');
    Route::post('/CheckOTP', [ResetPasswordController::class,'CheckOTP'])->name('check_otp');
    Route::post('/ForgetPasswordRequest', [ResetPasswordController::class,'ForgetPassword'])->name('forget_password_request');
    Route::get('/disease/{disease_name?}', [SingleDiseaseController::class,'SingleDisease_view'])->name('single_disease');


    Route::group(['prefix'=>'patient','middleware' => ['CheckPatientLogin']], function()
    {
        Route::get('/account', [AuthController::class,'account_view'])->name('account_view');
        Route::get('/history', [HistoryController::class,'History_view'])->name('history_view');
        Route::get('/logout', [AuthController::class,'logout'])->name('logout');
        // Route::get('/ResultCheck', [SingleDiseaseController::class,'SingleDisease_view'])->name('single_disease');
        Route::post('/ResultCheck', [DiseasesModelsHanlding::class,'SendModelRequest'])->name('result');
        Route::post('edit_account',[AccountController::class,'EditAccount'])->name('edit_account');
    });// end admin routes group
});
Route::get('account/verify/{token}', [Auth_Patient::class, 'verifyAccount'])->name('user.verify');

