<?php

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminPanel\FQAController;
use App\Http\Controllers\AdminPanel\AuthController;
use App\Http\Controllers\AdminPanel\SettingsController;
use App\Http\Controllers\AdminPanel\SubDiseasesController;
use App\Http\Controllers\AdminPanel\MainDiseasesController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\AdminPanel\AdminsManagementController;
use App\Http\Controllers\AdminPanel\PatientsManagementController;


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



Route::group(['prefix' => LaravelLocalization::setLocale().'/Admin','middleware'=>['change.lang']], function(Router $router) 
{
    Route::get('login', [AuthController::class,'login_view'])->name('admin_login');
    Route::post('/postLogin', [AuthController::class,'postLoginAdmin'])->name('post_login_admin');
    Route::get('/test',function(Request $request){
        $apiKey = "40da2b1ae0d64ef8903ee23d94e204d1";
        $response = Http::get('https://api.geoapify.com/v1/geocode/reverse', [
            'lat' => 31.1191646,
            'lon' => 30.9485132,
            'apiKey' => $apiKey,
        ]);
        
        if ($response->ok()) {
            $response = json_decode($response);
           return $response->features[0]->properties->state;
        } else {
            return 'error';
        }
    });

    Route::group(['middleware' => ['CheckAdminLogin']], function()
    {
        Route::get('dashboard', [AuthController::class,'dashboard'])->name('admin_dashboard');
        Route::get('MainDiseases', [MainDiseasesController::class,'DiseaseIndex'])->name('main_diseases');
        Route::post('CreateMainDiseases', [MainDiseasesController::class,'CreateDisease'])->name('create.main_diseases');
        Route::put('UpdateMainDiseases/{id}', [MainDiseasesController::class,'UpdateDisease'])->name('update.main_diseases');
        Route::delete('DeleteMainDiseases/{id}', [MainDiseasesController::class,'Destroy'])->name('delete.main_diseases');
        Route::get('SubDiseases', [SubDiseasesController::class,'SubDiseaseIndex'])->name('sub_diseases');
        Route::post('CreateSubDiseases', [SubDiseasesController::class,'CreateSubDisease'])->name('create.sub_diseases');
        Route::put('UpdateSubDiseases/{sub_disease_id}', [SubDiseasesController::class,'UpdateSubDisease'])->name('update.sub_diseases');
        Route::delete('DeleteSubDiseases/{id}', [SubDiseasesController::class,'Destroy'])->name('delete.sub_diseases');

        Route::get('FQA', [FQAController::class,'FQA_Index'])->name('fqa');
        Route::post('CreateFQA', [FQAController::class,'CreateFQA'])->name('create.fqa');
        Route::put('UpdateFQA/{FQA_id}', [FQAController::class,'UpdateFQA'])->name('update.fqa');
        Route::delete('DeleteFQA/{id}', [FQAController::class,'Destroy'])->name('delete.fqa');

        Route::get('Settings', [SettingsController::class,'settings_index'])->name('settings');

        Route::put('UpdateSettings/{id?}', [SettingsController::class,'UpdateSettings'])->name('update.settings');

        Route::get('PatientsManagements', [PatientsManagementController::class,'PatientsManagement'])->name('patients');
        Route::post('CreatePatient', [PatientsManagementController::class,'CreatePatient'])->name('create.patients');
        Route::put('UpdatePatient/{id}', [PatientsManagementController::class,'UpdatePatient'])->name('update.patients');
        Route::delete('DeletePatient/{id}', [PatientsManagementController::class,'Destroy'])->name('delete.patients');
       
        Route::get('AdminsManagements', [AdminsManagementController::class,'AdminsManagement'])->name('admins');
        Route::post('CreateAdmin', [AdminsManagementController::class,'CreateAdmin'])->name('create.admins');
        Route::put('UpdateAdmin/{id}', [AdminsManagementController::class,'UpdateAdmin'])->name('update.admins');
        Route::delete('DeleteAdmin/{id}', [AdminsManagementController::class,'Destroy'])->name('delete.admins');
       
        Route::get('Change_mode', [AuthController::class,'DarkLight'])->name('change_mode');
        Route::get('/logout', [AuthController::class,'logout'])->name('logout_admin');
    });// end admin routes group
});

