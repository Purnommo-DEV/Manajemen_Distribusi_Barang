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
        ])->with('relasi_produk')
            ->join('produk', 'produk.id', '=', 'produk_keluar.produk_id')
            ->orderBy('created_at', 'desc');

        // VERSI 1
        // if($request->input('search.value')!=null){
        //     $data = $data->where(function($q)use($request){
        //                 $q->whereRaw('LOWER(nama_produk) like ?',['%'.strtolower($request->input('search.value')).'%']);
        //             })->orWhere(function($q2)use($request){
        //                 $q2->whereRaw('LOWER(kode) like ?',['%'.strtolower($request->input('search.value')).'%']);
        //     });
        // }

        // VERSI 2
        if($request->input('search.value')!=null){
            $data = $data
                    ->with('relasi_produk')
                    ->whereHas('relasi_produk', function($q)use($request){
                        $q->whereRaw('LOWER(nama_produk) like ?',['%'.strtolower($request->input('search.value')).'%']);
                        $q->orWhereRaw('LOWER(kode) like ?',['%'.strtolower($request->input('search.value')).'%']);
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
