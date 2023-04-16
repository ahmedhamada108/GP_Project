<?php

namespace App\Http\Controllers\CheckUpWebsite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index_view(){
        return view('checkup.home');
    }
}
