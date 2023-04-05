<?php

namespace App\Http\Controllers\Produksi;

use App\Http\Controllers\Controller;
use App\Models\ProdukKeluar;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    public function halaman_barang_keluar(){
        return view('Produksi.ProdukKeluar.produk_keluar');
    }
    
    public function data_produk_keluar(Request $request){
        $data = ProdukKeluar::select([
            'produk_keluar.*'
        ])->with('relasi_produk')->orderBy('created_at', 'desc');

        if($request->input('search.value')!=null){
            $data = $data->where(function($q)use($request){
                    $q->whereRaw('LOWER(nama_produk) like ?',['%'.strtolower($request->input('search.value')).'%']);
            });
        }

        $rekamFilter = $data->get()->count();
        if($request->input('length')!=-1) 
            $data = $data->skip($request->input('start'))->take($request->input('length'));
            $rekamTotal = $data->count();
            $data = $data->get();
        return response()->json([
            'draw'=>$request->input('draw'),
            'data'=>$data,
            'recordsTotal'=>$rekamTotal,
            'recordsFiltered'=>$rekamFilter
        ]);
    }
}
