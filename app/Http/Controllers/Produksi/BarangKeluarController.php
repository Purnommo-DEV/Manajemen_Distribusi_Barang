<?php

namespace App\Http\Controllers\Produksi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    public function halaman_barang_keluar(){
        return view('Produksi.ProdukKeluar.produk_keluar');
    }
    
}
