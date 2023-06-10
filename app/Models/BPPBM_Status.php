<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BPPBM_Status extends Model
{
    use HasFactory;
    protected $table = "bppbm_status";
    protected $guarded = ['id'];

    public function relasi_bppbm(){
        return $this->belongsTo(BPPBM::class, 'bppbm_id', 'id');
    }
}
