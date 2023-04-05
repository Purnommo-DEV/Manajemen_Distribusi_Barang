<?php

namespace App\Http\Controllers\Marketing;

use App\Models\Produk;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use App\Models\PesananProduk;
use App\Models\StatusPesanan;
use App\Http\Controllers\Controller;
use App\Models\PengembalianProduk;
use Illuminate\Support\Facades\Validator;

class Marketing_PengembalianController extends Controller
{
    public function halaman_pengembalian(){
        return view('Marketing.Pengembalian.pengembalian');
    }

    public function data_pesanan_diterima(Request $request){
        $data = Pesanan::select([
            'pesanan.*'
        ])->with(['relasi_distributor', 'relasi_status'])->where('status', 4)->orderBy('created_at', 'desc');

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

    public function data_produk_pengembalian(Request $request, $id){
        $data = PengembalianProduk::select([
            'pengembalian_produk.*'
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

    public function pengembalian_produk_pesanan($id){
        $status_pesanan = StatusPesanan::where('pesanan_id', $id)->where('status', 4)->first() ?? new StatusPesanan();
        $produk = PesananProduk::where('pesanan_id', $id)->with('relasi_produk')->get();
        $data_pesanan = Pesanan::with('relasi_distributor')->where('id', $id)->first();

        return view('Marketing.Pengembalian.produk_pengembalian', compact('data_pesanan', 'produk', 'status_pesanan'));
    }

    public function data_produk_dipesan($pesanan_id, $id){
        $detail_produk = PesananProduk::where('pesanan_id', $pesanan_id)->where('produk_id', $id)->with('relasi_produk')->first();
        return response()->json([
            'status'=> 1,
            'produk'=> $detail_produk
        ]);
    }

    public function pengembalian_barang(Request $request){
        $subtotal = str_replace(['Rp. ', '.', '.', ',00'], ['', '', '', ''], $request->subtotal);
        $validator = Validator::make($request->all(), [
            'produk_id'=>'required',
            'kuantitas' => 'required',
            'keterangan' => 'required',
        ],[
            'produk_id.required'=> 'Wajib diisi',
            'kuantitas.required'=> 'Wajib diisi',
            'keterangan.required'=> 'Wajib diisi',
        ]);

        if(!$validator->passes()){
            return response()->json([
                'status'=>0,
                'error'=>$validator->errors()->toArray()
            ]);
        }else{
            $data_produk = Produk::select(['stok', 'id'])->where('id', $request->produk_id)->first();
            $data_produk_pengembalian =  PengembalianProduk::where('produk_id', $request->produk_id)->where('pesanan_id', $request->pesanan_id)->first();
            
            if($data_produk_pengembalian == null){
                PengembalianProduk::create([
                    'pesanan_id' => $request->pesanan_id,
                    'produk_id' => $request->produk_id,
                    'kuantitas'  => $request->kuantitas,
                    'keterangan'  => $request->keterangan,
                    'subtotal'  => $subtotal,

                ]);

            }else{
                PengembalianProduk::where('produk_id', $request->produk_id)->where('pesanan_id', $request->pesanan_id)->update([
                    'kuantitas'  => $data_produk_pengembalian->kuantitas + $request->kuantitas,
                    'subtotal'  => $data_produk_pengembalian->subtotal + $subtotal
                ]);
            }
            $pesanan_produk = PesananProduk::where('produk_id', $request->produk_id)->where('pesanan_id', $request->pesanan_id)->first();
            $pesanan_produk->update([
                'kuantitas' => $pesanan_produk->kuantitas - $request->kuantitas,
                'subtotal'  => $pesanan_produk->subtotal - $subtotal
            ]);

            Produk::where('id', $request->produk_id)->update([
                'stok'  => $data_produk->stok + $request->kuantitas
            ]);
            
            return response()->json([
                'status'=>1,
                'msg'=>'Berhasil Menambahkan Pesanan'
            ]);
        }
    }

    public function hapus_data_pengembalian($id){
        $data_pengembalian = PengembalianProduk::where('id', $id)->first();
        $data_pesanan_produk = PesananProduk::where('pesanan_id', $data_pengembalian->pesanan_id)->where('produk_id', $data_pengembalian->produk_id)->first();
        $data_pesanan_produk->update([
            'kuantitas' => $data_pengembalian->kuantitas + $data_pesanan_produk->kuantitas,
            'subtotal'  => $data_pengembalian->subtotal + $data_pesanan_produk->subtotal
        ]);
        $data_pengembalian->delete();
        return response()->json([
            'status'=>1,
            'msg'=>'Berhasil Menambahkan Pesanan'
        ]);
    }
}
