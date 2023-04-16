<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CheckUpWebsite\HomeController;
use App\Http\Controllers\CheckupWebsite\Patient\AuthController;
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



Route::group(['middleware'=>['change.lang']], function(Router $router) 
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


    Route::group(['prefix'=>'patient','middleware' => ['CheckPatientLogin']], function()
    {
        Route::get('/dashboard', [AuthController::class,'dashboard'])->name('dashboard');
        Route::get('/logout', [AuthController::class,'logout'])->name('logout');
    });// end admin routes group
});
Route::get('account/verify/{token}', [Auth_Patient::class, 'verifyAccount'])->name('user.verify');
