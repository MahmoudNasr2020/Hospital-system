<?php

namespace App\Http\Controllers\Hospital\Home;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        //$patients = Patient::count();
        return view('Hospital.pages.home');
    }

}
