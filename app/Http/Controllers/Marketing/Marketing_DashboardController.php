<?php

namespace App\Http\Controllers\Marketing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Marketing_DashboardController extends Controller
{
    public function dashboard(){
        return view('Marketing.Dashboard.dashboard');
    }
}
