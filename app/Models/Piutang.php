<?php

namespace App\Models;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Piutang extends Model
{
    use HasFactory, UsesUuid, SoftDeletes;
    protected $table = 'piutang';
    protected $guarded = ['id'];
    protected $fillable = [
        'pelanggan_id',
        'penigiriman_barang_id',
        'total_transaksi',
        'status',
        'total_bayar',
    ];

    public function getTanggalAttribute()
    {
        if ($this->created_at) {
            return tanggal_indonesia($this->created_at);
        }
    }

    public function getPelangganAttribute()
    {
        if ($this->hasPelanggan) {
            return $this->hasPelanggan->nama;
        }
    }

    public function hasPelanggan()
    {
        return $this->hasOne(Pelanggan::class, 'id', 'pelanggan_id');
    }

    public function getNoResiAttribute()
    {
        if ($this->hasPengirimBarang) {
            return $this->hasPengirimBarang->kode;
        }
    }

    public function hasPengirimBarang()
    {
        return $this->hasOne(PengirimanBarang::class, 'id', 'penigiriman_barang_id');
    }



}