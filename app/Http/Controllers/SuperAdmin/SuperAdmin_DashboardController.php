<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuperAdmin_DashboardController extends Controller
{
    public function dashboard(){
        return view('SuperAdmin.Dashboard.dashboard');
    }
}
