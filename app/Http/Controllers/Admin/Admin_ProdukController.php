<?php

namespace App\Http\Controllers\Admin;

use App\Models\Produk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class Admin_ProdukController extends Controller
{
    public function halaman_produk()
    {
        return view('Admin.Produk.produk');
    }

    public function data_produk(Request $request)
    {
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

    public function tambah_data_produk(Request $request)
    {
        $harga = str_replace(['Rp. ', '.', '.'], ['', '', ''], $request->harga);

        $validator = Validator::make($request->all(), [
            'kode' => 'required',
            'nama_produk' => 'required',
            'harga' => 'required|min:0',
            'stok' => 'required|numeric|min:0',
        ], [
            'kode.required' => 'Wajib diisi',
            'nama_produk.required' => 'Wajib diisi',
            'harga.required' => 'Wajib diisi',
            'harga.min' => 'Inputan harga minimal 0',
            'stok.numeric' => 'Wajib diisi dengan angka',
            'stok.min' => 'Inputan stok minimal 0',
            'stok.required' => 'Wajib diisi',
        ]);

        if (!$validator->passes()) {
            return response()->json([
                'status' => 0,
                'error' => $validator->errors()->toArray()
            ]);
        } else {
            $tambah_produk = Produk::create([
                'kode' => $request->kode,
                'nama_produk' => $request->nama_produk,
                'harga' => $harga,
                'stok' => $request->stok,
            ]);

            if (!$tambah_produk) {
                return response()->json([
                    'status' => 0,
                    'msg' => 'Terjadi kesalahan, Gagal Menambah Pengguna'
                ]);
            } else {
                return response()->json([
                    'status' => 1,
                    'msg' => 'Berhasil Menambahkan Pengguna'
                ]);
            }
        }
    }

    public function ubah_data_produk(Request $request)
    {
        $harga = str_replace(['Rp. ', '.', '.'], ['', '', ''], $request->harga);

        $validator = Validator::make($request->all(), [
            'kode' => 'required',
            'nama_produk' => 'required',
            'harga' => 'required|min:0',
            'stok' => 'required|numeric|min:0',
        ], [
            'kode.required' => 'Wajib diisi',
            'nama_produk.required' => 'Wajib diisi',
            'harga.required' => 'Wajib diisi',
            'harga.min' => 'Inputan harga minimal 0',
            'stok.numeric' => 'Wajib diisi dengan angka',
            'stok.min' => 'Inputan stok minimal 0',
            'stok.required' => 'Wajib diisi',
        ]);

        if (!$validator->passes()) {
            return response()->json([
                'status' => 0,
                'error' => $validator->errors()->toArray()
            ]);
        } else {
            $ubah_produk = Produk::where('id', $request->id)->update([
                'kode' => $request->kode,
                'nama_produk' => $request->nama_produk,
                'harga' => $harga,
                'stok' => $request->stok,
            ]);

            if (!$ubah_produk) {
                return response()->json([
                    'status' => 0,
                    'msg' => 'Terjadi kesalahan, Gagal Mengubah Data Pengguna'
                ]);
            } else {
                return response()->json([
                    'status' => 1,
                    'msg' => 'Berhasil Menambahkan Data Pengguna'
                ]);
            }
        }
    }

    public function hapus_data_produk($id)
    {
        $hapus_produk = Produk::find($id)->delete();
        if (!$hapus_produk) {
            return response()->json([
                'status' => 0,
                'msg' => 'Terjadi kesalahan, Gagal Menghapus Pengguna'
            ]);
        } else {
            return response()->json([
                'status' => 1,
                'msg' => 'Berhasil Menghapus Data Pengguna'
            ]);
        }
    }
}
