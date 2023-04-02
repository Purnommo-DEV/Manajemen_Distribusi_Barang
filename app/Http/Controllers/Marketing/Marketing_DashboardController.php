<?php

namespace App\Http\Controllers\Marketing;

use App\Models\Produk;
use App\Models\Pesanan;
use App\Models\Distributor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Marketing_DashboardController extends Controller
{
    public function dashboard(){
        $produk = Produk::count();
        $pesanan = Pesanan::count();
        $distributor = Distributor::count();
        return view('Marketing.Dashboard.dashboard', compact('produk', 'pesanan', 'distributor'));
    }
}
