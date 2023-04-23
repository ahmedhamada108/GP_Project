<?php

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminPanel\AuthController;
use App\Http\Controllers\AdminPanel\MainDiseasesController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


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


    Route::group(['middleware' => ['CheckAdminLogin']], function()
    {
        Route::get('dashboard', [AuthController::class,'dashboard'])->name('admin_dashboard');
        Route::get('MainDiseases', [MainDiseasesController::class,'DiseaseIndex'])->name('main_diseases');
        Route::post('CreateMainDiseases', [MainDiseasesController::class,'CreateDisease'])->name('create.main_diseases');
        Route::get('ShowMainDiseases/{id}', [MainDiseasesController::class,'GetDiseaseID'])->name('show.main_diseases');
        Route::put('UpdateMainDiseases/{id}', [MainDiseasesController::class,'UpdateDisease'])->name('update.main_diseases');
        Route::delete('DeleteMainDiseases/{id}', [MainDiseasesController::class,'Destroy'])->name('delete.main_diseases');

        Route::get('Change_mode', [AuthController::class,'DarkLight'])->name('change_mode');
        Route::get('/logout', [AuthController::class,'logout'])->name('logout_admin');
    });// end admin routes group
});

