<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
    use Uuids;
    use HasFactory;
    protected $table = "distributor";
    protected $guarded = ['id'];
}
