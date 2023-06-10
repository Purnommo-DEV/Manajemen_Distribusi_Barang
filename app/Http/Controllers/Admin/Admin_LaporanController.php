<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\BPPBM;
use App\Models\Produk;
use App\Models\Pesanan;
use App\Models\Perjalanan;
use Illuminate\Http\Request;
use App\Models\PesananProduk;
use App\Models\StatusPesanan;
use App\Http\Controllers\Controller;
use App\Models\Rute;
use App\Models\Transaksi;
use App\Models\TransaksiDetail;

class Admin_LaporanController extends Controller
{
    // LAPORAN STOK PRODUK
    public function halaman_laporan_stok_produk(){
        return view('Admin.Laporan.stok_produk');
    }

    public function data_laporan_stok_produk(Request $request){
        $data = Produk::select([
            'produk.*'
        ])->orderBy('created_at', 'desc');

        if ($request->input('search.value') != null) {
            $data = $data->where(function ($q) use ($request) {
                $q->whereRaw('LOWER(nama_produk) like ?', ['%' . strtolower($request->input('search.value')) . '%']);
            })->orWhere(function ($q2) use ($request) {
                $q2->whereRaw('LOWER(kode) like ?', ['%' . strtolower($request->input('search.value')) . '%']);
            });
        }

        $rekamFilter = $data->get()->count();
        if ($request->input('length') != -1)
            $data = $data->skip($request->input('start'))->take($request->input('length'));
        $rekamTotal = $data->count();
        $data = $data->get();
        return response()->json([
            'draw' => $request->input('draw'),
            'data' => $data,
            'recordsTotal' => $rekamTotal,
            'recordsFiltered' => $rekamFilter
        ]);
    }

    // LAPORAN BPPBM
    public function halaman_laporan_bppbm(){
        return view('Admin.Laporan.bppbm');
    }

    public function data_laporan_bppbm(Request $request)
    {
        $data = Perjalanan::select([
            'perjalanan.*'
        ])->with('relasi_sales');

        $rekamFilter = $data->get()->count();
        if ($request->input('length') != -1)
            $data = $data->skip($request->input('start'))->take($request->input('length'));
        $rekamTotal = $data->count();
        $data = $data->get();

        return response()->json([
            'draw' => $request->input('draw'),
            'data' => $data,
            'recordsTotal' => $rekamTotal,
            'recordsFiltered' => $rekamFilter
        ]);
    }

    public function detail_data_laporan_bppbm(Request $request, $perjalanan_id){
        $data = BPPBM::select([
            'bppbm.*'
        ])->with('relasi_perjalanan', 'relasi_produk')->where('perjalanan_id', $perjalanan_id);


        $rekamFilter = $data->get()->count();
        if ($request->input('length') != -1)
            $data = $data->skip($request->input('start'))->take($request->input('length'));
        $rekamTotal = $data->count();
        $data = $data->get();

        return response()->json([
            'draw' => $request->input('draw'),
            'data' => $data,
            'recordsTotal' => $rekamTotal,
            'recordsFiltered' => $rekamFilter
        ]);
    }

    // LAPORAN PERJALANAN
    public function halaman_laporan_perjalanan(){
        return view('Admin.Laporan.perjalanan');
    }

    public function data_laporan_perjalanan(Request $request)
    {
        $data = Perjalanan::select([
            'perjalanan.*'
        ])->with('relasi_sales');

        $rekamFilter = $data->get()->count();
        if ($request->input('length') != -1)
            $data = $data->skip($request->input('start'))->take($request->input('length'));
        $rekamTotal = $data->count();
        $data = $data->get();

        return response()->json([
            'draw' => $request->input('draw'),
            'data' => $data,
            'recordsTotal' => $rekamTotal,
            'recordsFiltered' => $rekamFilter
        ]);
    }

    public function detail_data_laporan_perjalanan(Request $request, $perjalanan_id){
        $data = Rute::select([
            'rute.*'
        ])->with('relasi_perjalanan', 'relasi_customer')->where('perjalanan_id', $perjalanan_id);


        $rekamFilter = $data->get()->count();
        if ($request->input('length') != -1)
            $data = $data->skip($request->input('start'))->take($request->input('length'));
        $rekamTotal = $data->count();
        $data = $data->get();

        return response()->json([
            'draw' => $request->input('draw'),
            'data' => $data,
            'recordsTotal' => $rekamTotal,
            'recordsFiltered' => $rekamFilter
        ]);
    }

    // LAPORAN TRANSAKSI
    public function halaman_laporan_transaksi(){
        return view('Admin.Laporan.transaksi');
    }

    public function data_laporan_transaksi(Request $request)
    {
        $data = Transaksi::select([
            'transaksi.*'
        ])->with('relasi_perjalanan','relasi_perjalanan.relasi_sales','relasi_customer');

        $rekamFilter = $data->get()->count();
        if ($request->input('length') != -1)
            $data = $data->skip($request->input('start'))->take($request->input('length'));
        $rekamTotal = $data->count();
        $data = $data->get();

        return response()->json([
            'draw' => $request->input('draw'),
            'data' => $data,
            'recordsTotal' => $rekamTotal,
            'recordsFiltered' => $rekamFilter
        ]);
    }

    public function detail_data_laporan_transaksi(Request $request, $transaksi_id){
        $data = TransaksiDetail::select([
            'transaksi_detail.*'
        ])->with('relasi_transaksi', 'relasi_produk')->where('transaksi_id', $transaksi_id);


        $rekamFilter = $data->get()->count();
        if ($request->input('length') != -1)
            $data = $data->skip($request->input('start'))->take($request->input('length'));
        $rekamTotal = $data->count();
        $data = $data->get();

        return response()->json([
            'draw' => $request->input('draw'),
            'data' => $data,
            'recordsTotal' => $rekamTotal,
            'recordsFiltered' => $rekamFilter
        ]);
    }
}
