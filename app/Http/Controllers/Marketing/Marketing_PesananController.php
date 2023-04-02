<?php

namespace App\Http\Controllers\Marketing;

use App\Models\Produk;
use App\Models\Pesanan;
use App\Models\Distributor;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PesananProduk;
use App\Models\StatusPesanan;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class Marketing_PesananController extends Controller
{
    public function halaman_pesanan(){
        $distributor = Distributor::get(['id', 'nama']);
        $produk = Produk::get(['id', 'nama_produk', 'harga', 'stok']);
        return view('Marketing.Pesanan.pesanan', compact('produk', 'distributor'));
    }

    public function produk_detail($id){
        $detail_produk = Produk::select(['harga','stok'])->where('id', $id)->first();
        
        return response()->json([
            'status'=> 1,
            'produk'=> $detail_produk
        ]);
    }

    public function pilih_cari_distributor(Request $request)
    {
    	$data_distributor = [];
        if($request->has('q')){
            $cari = $request->q;
            $data_distributor = Distributor::select("id", "nama")
            		->where('nama', 'LIKE', "%$cari%")
            		->get();
        }
        return response()->json($data_distributor);
    }

    public function data_pesanan(Request $request){
        $data = Pesanan::select([
            'pesanan.*'
        ])->with(['relasi_distributor', 'relasi_status'])->orderBy('created_at', 'desc');

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

    public function tambah_data_pesanan(Request $request){
        $validator = Validator::make($request->all(), [
            'distributor_id'=>'required',
            'tanggal_pesan' => 'required',
        ],[
            'distributor_id.required'=> 'Wajib diisi',
            'tanggal_pesan.required'=> 'Wajib diisi',
        ]);

        if(!$validator->passes()){
            return response()->json([
                'status'=>0,
                'error'=>$validator->errors()->toArray()
            ]);
        }else{
            $tambah_distributor = Pesanan::create([
                'kode'           => "INV-".Str::random(7),
                'distributor_id' => $request->distributor_id,
                'tanggal_pesan'  => $request->tanggal_pesan
            ]);
            
            if(!$tambah_distributor){
                return response()->json([
                    'status'=>0,
                    'msg'=>'Terjadi kesalahan, Gagal Menambah Pesanan'
                ]);
            }else{
                return response()->json([
                    'status'=>1,
                    'msg'=>'Berhasil Menambahkan Pesanan'
                ]);
            }
        }
    }

    public function ubah_data_pesanan(Request $request, ){
        $validator = Validator::make($request->all(), [
            'distributor_id'=>'required',
            'tanggal_pesan' => 'required',
        ],[
            'distributor_id.required'=> 'Wajib diisi',
            'tanggal_pesan.required'=> 'Wajib diisi',
        ]);

        if(!$validator->passes()){
            return response()->json([
                'status'=>0,
                'error'=>$validator->errors()->toArray()
            ]);
        }else{
            $tambah_distributor = Pesanan::where('id', $request->id)->update([
                'distributor_id' => $request->distributor_id,
                'tanggal_pesan'  => $request->tanggal_pesan
            ]);
            
            if(!$tambah_distributor){
                return response()->json([
                    'status'=>0,
                    'msg'=>'Terjadi kesalahan, Gagal Menambah Pesanan'
                ]);
            }else{
                return response()->json([
                    'status'=>1,
                    'msg'=>'Berhasil Menambahkan Pesanan'
                ]);
            }
        }
    }

    public function hapus_data_pesanan($id){
        $hapus_pesanan = Pesanan::find($id)->delete();
        if(!$hapus_pesanan){
            return response()->json([
                'status'=>0,
                'msg'=>'Terjadi kesalahan, Gagal Menghapus Pesanan'
            ]);
        }else{
            return response()->json([
                'status'=>1,
                'msg'=>'Berhasil Menghapus Data Pesanan'
            ]);
        }
    }

    public function produk_pesanan($id){
        $status_pesanan = StatusPesanan::orderBy('created_at', 'desc')->where('pesanan_id', $id)->first() ?? new StatusPesanan();
        $produk = Produk::get(['id', 'nama_produk']);
        $data_pesanan = Pesanan::with('relasi_distributor')->where('id', $id)->first();

        return view('Marketing.Pesanan.produk_pesanan', compact('data_pesanan', 'produk', 'status_pesanan'));
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

    public function tambah_distribusi_barang(Request $request){
        $subtotal = str_replace(['Rp. ', '.', '.', ',00'], ['', '', '', ''], $request->subtotal);
        $validator = Validator::make($request->all(), [
            'produk_id'=>'required',
            'kuantitas' => 'required',
        ],[
            'produk_id.required'=> 'Wajib diisi',
            'kuantitas.required'=> 'Wajib diisi',
        ]);

        if(!$validator->passes()){
            return response()->json([
                'status'=>0,
                'error'=>$validator->errors()->toArray()
            ]);
        }else{
            $data_produk = Produk::select(['stok', 'id'])->where('id', $request->produk_id)->first();
            $data_produk_pesanan =  PesananProduk::where('produk_id', $request->produk_id)->where('pesanan_id', $request->pesanan_id)->first();
            
            if($data_produk_pesanan == null){
                PesananProduk::create([
                    'pesanan_id' => $request->pesanan_id,
                    'produk_id' => $request->produk_id,
                    'kuantitas'  => $request->kuantitas,
                    'subtotal'  => $subtotal
                ]);

            }else{
                PesananProduk::where('produk_id', $request->produk_id)->where('pesanan_id', $request->pesanan_id)->update([
                    'kuantitas'  => $data_produk_pesanan->kuantitas + $request->kuantitas,
                    'subtotal'  => $data_produk_pesanan->subtotal + $subtotal
                ]);
            }
            
            Produk::where('id', $request->produk_id)->update([
                'stok'  => $data_produk->stok - $request->kuantitas
            ]);
            
            return response()->json([
                'status'=>1,
                'msg'=>'Berhasil Menambahkan Pesanan'
            ]);
        }
    }

    public function hapus_data_produk_pesanan($id){
        $data_pesanan_produk = PesananProduk::where('id', $id)->first();
        $data_produk = Produk::where('id', $data_pesanan_produk->produk_id)->first();
        $data_produk->update([
            'stok' => $data_pesanan_produk->kuantitas + $data_produk->stok
        ]);
        $hapus_produk_pesanan = PesananProduk::find($id)->delete();
        if(!$hapus_produk_pesanan){
            return response()->json([
                'status'=>0,
                'msg'=>'Terjadi kesalahan, Gagal Menghapus Pesanan'
            ]);
        }else{
            return response()->json([
                'status'=>1,
                'msg'=>'Berhasil Menghapus Data Pesanan'
            ]);
        }
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

    public function status_pesanan(Request $request){
        Pesanan::where('id', $request->pesanan_id)->update([
            'status' => $request->status
        ]);
        StatusPesanan::create([
            'pesanan_id'=> $request->pesanan_id,
            'status'    => $request->status,
        ]);
        
        return response()->json([
            'status'=>1,
            'msg'=>'Berhasil Menambahkan Pesanan'
        ]);
    }
}
