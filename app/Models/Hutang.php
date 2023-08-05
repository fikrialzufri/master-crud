<?php

namespace App\Models;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hutang extends Model
{
    use HasFactory, UsesUuid, SoftDeletes;
    protected $table = 'hutang';
    protected $guarded = ['id'];
    protected $fillable = [
        'vendor_id',
        'penigiriman_barang_id',
        'total_hutang',
        'status',
        'total_bayar',
    ];


    public function getVendorAttribute()
    {
        if ($this->hasVendor) {
            return $this->hasVendor->nama;
        }
    }


    public function hasVendor()
    {
        return $this->hasOne(Pelanggan::class, 'id', 'vendor_id');
    }

}