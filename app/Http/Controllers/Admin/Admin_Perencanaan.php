<?php

namespace App\Http\Controllers\Admin;

use App\Models\Perjalanan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Rute;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class Admin_Perencanaan extends Controller
{
    //PERENCANAAN PERJALANAN
    public function halaman_perjalanan(){
        $sales_retail = User::get(['id', 'nama', 'role_id'])->where('role_id', 2);
        return view('Admin.Perencanaan.Perjalanan.perjalanan', compact('sales_retail'));
    }

    public function data_perjalanan(Request $request)
    {
        $data = Perjalanan::select([
            'perjalanan.*'
        ])->with('relasi_sales', 'relasi_kendaraan');


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

    public function tambah_data_perjalanan(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_sales_id' => 'required',
        ], [
            'user_sales_id.required' => 'Wajib diisi']);

        if (!$validator->passes()) {
            return response()->json([
                'status' => 0,
                'error' => $validator->errors()->toArray()
            ]);
        } else {
            $tambah_perjalanan = Perjalanan::create([
                'kode' => 'P-' . Str::random(7),
                'user_sales_id' => $request->user_sales_id,
            ]);

            if (!$tambah_perjalanan) {
                return response()->json([
                    'status' => 0,
                    'msg' => 'Terjadi kesalahan, Gagal Menambah List Sales Perjalanan'
                ]);
            } else {
                return response()->json([
                    'status' => 1,
                    'msg' => 'Berhasil Menambahkan List Sales Perjalanan'
                ]);
            }
        }
    }

    public function proses_ubah_data_perjalanan(Request $request, $kode)
    {
        $data_perjalanan = Perjalanan::where('kode', $kode)->first();
        $validator = Validator::make($request->all(), [
            'user_sales_id' => 'required'
        ], [
            'user_sales_id.required' => 'Wajib diisi',
        ]);

        if (!$validator->passes()) {
            return response()->json([
                'status' => 0,
                'error' => $validator->errors()->toArray()
            ]);
        } else {
            $data_perjalanan->update([
                'user_sales_id' => $request->user_sales_id,
            ]);

            if (!$data_perjalanan) {
                return response()->json([
                    'status' => 0,
                    'msg' => 'Terjadi kesalahan, Gagal Mengubah List Sales Perjalanan'
                ]);
            } else {
                return response()->json([
                    'status' => 1,
                    'msg' => 'Berhasil Mengubah List Sales Perjalanan',
                    'route' => route('admin.HalamanPerjalanan')
                ]);
            }
        }
    }

    public function hapus_data_perjalanan($id)
    {
        $hapuslistsales = Perjalanan::find($id)->delete();
        if (!$hapuslistsales) {
            return response()->json([
                'status' => 0,
                'msg' => 'Terjadi kesalahan, Gagal Menghapus List Sales Perjalanan'
            ]);
        } else {
            return response()->json([
                'status' => 1,
                'msg' => 'Berhasil Menghapus Data List Sales Perjalanan'
            ]);
        }
    }

    public function halaman_kunjungi_customer($kode_perjalanan){
        $perjalanan = Perjalanan::where('kode', $kode_perjalanan)->first();
        $customer_retail = Customer::get(['id', 'nama', 'jenis_customer'])->where('jenis_customer', 'r');
        return view('Admin.Perencanaan.Perjalanan.daftar_kunjungi_customer', compact('customer_retail', 'perjalanan'));
    }

    public function data_kunjungi_customer(Request $request, $perjalanan_id)
    {
        $data = Rute::select([
            'rute.*'
        ])->with('relasi_customer', 'relasi_perjalanan')->where('perjalanan_id', $perjalanan_id);


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

    public function tambah_data_kunjungi_customer(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'customer_id' => 'required',
            'tanggal'     => 'required'
        ], [
            'customer_id.required' => 'Wajib diisi',
            'tanggal.required' => 'Wajib diisi'
        ]);

        if (!$validator->passes()) {
            return response()->json([
                'status' => 0,
                'error' => $validator->errors()->toArray()
            ]);
        } else {
            $tambah_kunjungi_customer = Rute::create([
                'perjalanan_id' => $request->perjalanan_id,
                'customer_id' => $request->customer_id,
                'tanggal' => $request->tanggal,
                'status'  => 0
            ]);

            if (!$tambah_kunjungi_customer) {
                return response()->json([
                    'status' => 0,
                    'msg' => 'Terjadi kesalahan, Gagal Menambah Daftar Rencana Kunjungi Customer'
                ]);
            } else {
                return response()->json([
                    'status' => 1,
                    'msg' => 'Berhasil Menambahkan Daftar Rencana Kunjungi Customer'
                ]);
            }
        }
    }

    public function ubah_data_kunjungi_customer(Request $request)
    {
        $data_kunjungi_customer = Rute::where('id', $request->id)->first();
        $validator = Validator::make($request->all(), [
            'customer_id' => 'required',
            'tanggal' => 'required'
        ], [
            'customer_id.required' => 'Wajib diisi',
            'tanggal.required' => 'Wajib diisi',
        ]);

        if (!$validator->passes()) {
            return response()->json([
                'status' => 0,
                'error' => $validator->errors()->toArray()
            ]);
        } else {
            $data_kunjungi_customer->update([
                'customer_id' => $request->customer_id,
                'tanggal' => $request->tanggal,
            ]);

            if (!$data_kunjungi_customer) {
                return response()->json([
                    'status' => 0,
                    'msg' => 'Terjadi kesalahan, Gagal Mengubah Daftar Rencana Kunjungi Customer'
                ]);
            } else {
                return response()->json([
                    'status' => 1,
                    'msg' => 'Berhasil Mengubah Daftar Rencana Kunjungi Customer',
                ]);
            }
        }
    }

    public function hapus_data_kunjungi_customer($id)
    {
        $hapus_daftar_customer = Rute::find($id)->delete();
        if (!$hapus_daftar_customer) {
            return response()->json([
                'status' => 0,
                'msg' => 'Terjadi kesalahan, Gagal Menghapus Daftar Rencana Kunjungi Customer'
            ]);
        } else {
            return response()->json([
                'status' => 1,
                'msg' => 'Berhasil Menghapus Data Daftar Rencana Kunjungi Customer'
            ]);
        }
    }
}
