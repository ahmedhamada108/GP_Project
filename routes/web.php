<?php

use GuzzleHttp\Client;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Patient\Auth_Patient;
use App\Http\Controllers\CheckUpWebsite\HomeController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\CheckupWebsite\Patient\AuthController;
use App\Http\Controllers\CheckUpWebsite\SingleDiseaseController;
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
    Route::get('/{disease_name}', [SingleDiseaseController::class,'SingleDisease_view'])->name('single_disease');


    Route::group(['prefix'=>'patient','middleware' => ['CheckPatientLogin']], function()
    {
        Route::get('/dashboard', [AuthController::class,'dashboard'])->name('dashboard');
        Route::get('/logout', [AuthController::class,'logout'])->name('logout');
        // Route::get('/ResultCheck', [SingleDiseaseController::class,'SingleDisease_view'])->name('single_disease');
        Route::post('/ResultCheck', [DiseasesModelsHanlding::class,'SendModelRequest'])->name('result');

    });// end admin routes group
});
Route::get('account/verify/{token}', [Auth_Patient::class, 'verifyAccount'])->name('user.verify');

Route::get('admin/loaction',function(){
    $client = new Client();
    $response = $client->get('https://api.ipify.org');

    if ($response->getStatusCode() == 200) {
        $ipAddress = $response->getBody();
        $key = '4d618b4d-1e55-4e2f-82bf-29920d666ac0';
        $client2 = new Client();
        $headers = [
            'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36',
        ];
        $response2 = $client2->get("https://apiip.net/api/check?ip={$ipAddress}&accessKey={$key}", [
            'headers' => $headers,
        ]);

        if ($response2->getStatusCode() == 200) {
            $responseData = json_decode($response->getBody(), true);
            // do something with the response data
            return $responseData;
        }
        // echo "Your public IP address is: " . $ipAddress;
    }
});