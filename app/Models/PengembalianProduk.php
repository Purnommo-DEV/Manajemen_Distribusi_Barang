<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PengembalianProduk extends Model
{
    use Uuids;
    use HasFactory;
    protected $table = "pengembalian_produk";
    protected $guarded = ['id'];

    public function relasi_pesanan(){
        return $this->belongsTo(Pesanan::class, 'pesanan_id', 'id');
    }

    public function relasi_produk(){
        return $this->belongsTo(Produk::class, 'produk_id', 'id');
    }

}
