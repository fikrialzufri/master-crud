<?php

namespace App\Models;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HargaDetail extends Model
{
    use HasFactory, UsesUuid, SoftDeletes;

    protected $table = 'harga_detail';
    protected $guarded = ['id'];
    protected $fillable = [
        'berat',
        'harga',
        'asal_kota_id',
        'tujuan_kota_id',
        'cabang_id',
        'harga_id',
    ];
}
