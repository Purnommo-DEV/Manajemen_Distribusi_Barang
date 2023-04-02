<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pesanan extends Model
{
    use Uuids;
    use HasFactory;
    protected $table = "pesanan";
    protected $guarded = ['id'];

    public function relasi_distributor(){
        return $this->belongsTo(Distributor::class, 'distributor_id', 'id');
    }

    public function relasi_status(){
        return $this->belongsTo(StatusPesanan::class, 'pesanan_id', 'id');
    }
}
