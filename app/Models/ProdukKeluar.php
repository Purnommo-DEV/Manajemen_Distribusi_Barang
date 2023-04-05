<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProdukKeluar extends Model
{
    use Uuids;
    use HasFactory;
    protected $table = "produk_keluar";
    protected $guarded = ['id'];

    public function relasi_produk(){
        return $this->belongsTo(Produk::class, 'produk_id', 'id');
    }
}
