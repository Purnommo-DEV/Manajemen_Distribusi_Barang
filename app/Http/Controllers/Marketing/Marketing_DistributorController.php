<?php

namespace App\Http\Controllers\Marketing;

use App\Models\Distributor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class Marketing_DistributorController extends Controller
{
    public function halaman_distributor(){
        return view('Marketing.Distributor.distributor');
    }

    public function data_distributor(Request $request){
        $data = Distributor::select([
            'distributor.*'
        ])->orderBy('id', 'desc');

        if($request->input('search.value')!=null){
            $data = $data->where(function($q)use($request){
                    $q->whereRaw('LOWER(nama) like ?',['%'.strtolower($request->input('search.value')).'%'])
                    ->orWhere->whereRaw('LOWER(alamat) like ?',['%'.strtolower($request->input('search.value')).'%'])
                    ->orWhere->whereRaw('LOWER(nomor_hp) like ?',['%'.strtolower($request->input('search.value')).'%']);
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

    public function tambah_data_distributor(Request $request){
        $validator = Validator::make($request->all(), [
            'nama'=>'required',
            'alamat' => 'required',
            'nomor_hp' => 'required|numeric|min:0',
        ],[
            'nama.required'=> 'Wajib diisi',
            'alamat.required'=> 'Wajib diisi',
            'nomor_hp.numeric'=> 'Wajib diisi dengan angka',
            'nomor_hp.min'=> 'Inputan nomor hp minimal 0',
            'nomor_hp.required'=> 'Wajib diisi',
        ]);

        if(!$validator->passes()){
            return response()->json([
                'status'=>0,
                'error'=>$validator->errors()->toArray()
            ]);
        }else{
            $tambah_distributor = Distributor::create([
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'nomor_hp' => $request->nomor_hp,
            ]);
            
            if(!$tambah_distributor){
                return response()->json([
                    'status'=>0,
                    'msg'=>'Terjadi kesalahan, Gagal Menambah Distributor'
                ]);
            }else{
                return response()->json([
                    'status'=>1,
                    'msg'=>'Berhasil Menambahkan Distributor'
                ]);
            }
    }
}
public function ubah_data_distributor(Request $request){

    $validator = Validator::make($request->all(), [
        'nama'=>'required',
        'alamat' => 'required',
        'nomor_hp' => 'required|numeric|min:0',
    ],[
        'nama.required'=> 'Wajib diisi',
        'alamat.required'=> 'Wajib diisi',
        'nomor_hp.numeric'=> 'Wajib diisi dengan angka',
        'nomor_hp.min'=> 'Inputan nomor hp minimal 0',
        'nomor_hp.required'=> 'Wajib diisi',
    ]);

    if(!$validator->passes()){
        return response()->json([
            'status'=>0,
            'error'=>$validator->errors()->toArray()
        ]);
    }else{
        $ubah_distributor = Distributor::where('id', $request->id)->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'nomor_hp' => $request->nomor_hp,
        ]);
        
        if(!$ubah_distributor){
            return response()->json([
                'status'=>0,
                'msg'=>'Terjadi kesalahan, Gagal Mengubah Data Distributor'
            ]);
        }else{
            return response()->json([
                'status'=>1,
                'msg'=>'Berhasil Mengubah Data Distributor'
            ]);
        }
    }
}

public function hapus_data_distributor($id){
    $hapus_distributor = Distributor::find($id)->delete();
    if(!$hapus_distributor){
        return response()->json([
            'status'=>0,
            'msg'=>'Terjadi kesalahan, Gagal Menghapus Distributor'
        ]);
    }else{
        return response()->json([
            'status'=>1,
            'msg'=>'Berhasil Menghapus Data Distributor'
        ]);
    }
}
}