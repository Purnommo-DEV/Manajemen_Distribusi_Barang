<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Produk;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use App\Models\PesananProduk;
use App\Models\StatusPesanan;
use App\Http\Controllers\Controller;

class Admin_LaporanController extends Controller
{
    public function laporan_pesanan(){
        return view('Admin.Laporan.daftar_laporan');
    }

    public function data_pesanan(Request $request){
        $data = Pesanan::select([
            'pesanan.*'
        ])->with(['relasi_distributor', 'relasi_status'])->orderBy('created_at', 'desc');
        
        // $tgl_awal = $request->input('data_tgl_awal');
        // $tgl_akhir = $request->input('data_tgl_akhir');

        // dd($tgl_awal, $tgl_akhir);

        // if ($request->input('tgl_awal') && $request->input('tgl_akhir')) {

        //     $tgl_awal  = Carbon::parse($request->input('tgl_awal'));
        //     $tgl_akhir = Carbon::parse($request->input('tgl_akhir'));

        //     if ($tgl_akhir->greaterThan($tgl_awal)) {
        //         $rekamFilter = $data->get()->count();
        //         if($request->input('length')!=-1) 
        //             $data = $data->skip($request->input('start'))->take($request->input('length'));
        //             $rekamTotal = $data->count();
        //             $data = $data->whereBetween('created_at', [$tgl_awal, $tgl_akhir])->get();
        //     } else {
        //         $rekamFilter = $data->get()->count();
        //         if($request->input('length')!=-1) 
        //             $data = $data->skip($request->input('start'))->take($request->input('length'));
        //             $rekamTotal = $data->count();
        //             $data = $data->get();
        //     }
            
        // }else{
        //     $rekamFilter = $data->get()->count();
        //     if($request->input('length')!=-1) 
        //     $data = $data->skip($request->input('start'))->take($request->input('length'));
        //     $rekamTotal = $data->count();
        //     $data = $data->latest()->get();
        // }
        // if($request->input('role_pengguna')!=null){
        //     $data = $data->where('role_id', $request->role_pengguna);
        // }
        $rekamFilter = $data->get()->count();
            if($request->input('length')!=-1) 
            $data = $data->skip($request->input('start'))->take($request->input('length'));
            $rekamTotal = $data->count();
            $data = $data->latest()->get();
        
        return response()->json([
            'draw'=>$request->input('draw'),
            'data'=>$data,
            'recordsTotal'=>$rekamTotal,
            'recordsFiltered'=>$rekamFilter
        ]);
    }

    public function laporan_produk_pesanan($id){
        $status_pesanan = StatusPesanan::orderBy('created_at', 'desc')->where('pesanan_id', $id)->first() ?? new StatusPesanan();
        $produk = Produk::get(['id', 'nama_produk']);
        $data_pesanan = Pesanan::with('relasi_distributor')->where('id', $id)->first();

        return view('Admin.Laporan.detail_laporan', compact('data_pesanan', 'produk', 'status_pesanan'));
    }

    public function data_produk_pesanan(Request $request, $id){
        $data = PesananProduk::select([
            'produk_pesanan.*'
        ])->with('relasi_pesanan', 'relasi_produk')->where('pesanan_id', $id)->orderBy('id', 'desc');

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

    public function data_status_pesanan(Request $request, $id){
        $data = StatusPesanan::select([
            'status_pesanan.*'
        ])->with('relasi_pesanan')->where('pesanan_id', $id);
            $data = $data->orderBy('created_at', 'desc')->get();
        return response()->json([
            'draw'=>$request->input('draw'),
            'data'=>$data,
        ]);
    }
}
