<?php

namespace App\Models;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CetakPengirimanBarang extends Model
{
    use HasFactory, UsesUuid, SoftDeletes;

    protected $table = 'cetak_pengiriman_barang';
    // cetak_pengiriman_barang
}