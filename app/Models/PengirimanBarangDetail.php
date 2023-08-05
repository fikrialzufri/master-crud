<?php

namespace App\Models;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Str;

class PengirimanBarangDetail extends Model
{
    use HasFactory, UsesUuid, SoftDeletes;

    protected $table = 'pengiriman_barang_detail';
    protected $guarded = ['id'];
    protected $fillable = [
        'penigiriman_barang_id',
        'lebar',
        'tinggi',
        'berat',
        'konversi_id',
        'total_berat',
        'koli',
        'harga_satuan',
        'subtotal',
    ];

    public function setKodeAttribute($value)
    {
        $this->attributes['kode'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
}