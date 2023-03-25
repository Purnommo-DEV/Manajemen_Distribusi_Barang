<?php

namespace App\Http\Controllers\Marketing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Marketing_PengembalianController extends Controller
{
    public function halaman_pengembalian(){
        return view('Marketing.Pengembalian.pengembalian');
    }
}
