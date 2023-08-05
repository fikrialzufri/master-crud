<?php

namespace App\Models;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Str;
use Carbon\Carbon;

class PengirimanBarang extends Model
{
    use HasFactory, UsesUuid, SoftDeletes;

    protected $table = 'pengiriman_barang';
    protected $guarded = ['id'];

    public function setKodeAttribute($value)
    {
        $this->attributes['kode'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function getTanggalAttribute()
    {
        if ($this->tanggal_resi != null) {
            return tanggal_indonesia_waktu($this->tanggal_resi);
        }
    }

    public function getPengirimAttribute()
    {
        if ($this->hasPengirim) {
            return $this->hasPengirim->nama;
        }
    }
    public function getNoHpPengirimAttribute()
    {
        if ($this->hasPengirim) {
            return $this->hasPengirim->no_hp;
        }
    }


    public function hasPengirim()
    {
        return $this->hasOne(Pelanggan::class, 'id', 'pengirim_kirim_id');
    }

    public function hasJenisPembayaran()
    {
        return $this->hasOne(JenisPembayaran::class, 'id', 'jenis_pembayaran_id');
    }
    public function getJenisPembayaranAttribute()
    {
        if ($this->hasJenisPembayaran) {
            return $this->hasJenisPembayaran->nama;
        }
    }

    public function getPenerimaAttribute()
    {
        if ($this->hasPenerima) {
            return $this->hasPenerima->nama;
        }
    }

    public function getNoHpPenerimaAttribute()
    {
        if ($this->hasPenerima) {
            return $this->hasPenerima->no_hp;
        }
    }

    public function getAlamatPenerimaAttribute()
    {
        if ($this->hasPenerima) {
            return $this->hasPenerima->alamat;
        }
    }


    public function hasPenerima()
    {
        return $this->hasOne(Pelanggan::class, 'id', 'penerima_kirim_id');
    }


    public function getVendorAttribute()
    {
        if ($this->hasVendor) {
            return $this->hasVendor->nama;
        }
    }
    public function getNoHpVendorAttribute()
    {
        if ($this->hasVendor) {
            return $this->hasVendor->no_hp;
        }
    }

    public function getTotalHutangVendorAttribute()
    {
        if ($this->hasVendor) {
            return $this->hasVendor->total_hutang;
        }
    }


    public function hasVendor()
    {
        return $this->hasOne(Pelanggan::class, 'id', 'vendor_id');
    }

    public function hasStiker()
    {
        return $this->hasMany(CetakPengirimanBarang::class, 'id', 'pengiriman_barang_id');
    }


    // // many to many harga to kota
    // public function hasPengirimanBarangDetail()
    // {
    //     return $this->hasMany(PengirimanBarangDetail::class, 'id', 'pengirim_kirim_id');
    // }
    // // get harga detail
    // public function getPengirimanBarangDetailAttribute()
    // {
    //     $data = [];

    //     return $data;
    // }

    public function hasTujuan()
    {
        return $this->hasOne(Kota::class, 'id', 'tujuan_kota_id');
    }

    public function getTujuanAttribute()
    {
        if ($this->hasTujuan) {
            return $this->hasTujuan->nama;
        }
    }
    public function hasAsal()
    {
        return $this->hasOne(Kota::class, 'id', 'asal_kota_id');
    }

    public function getAsalAttribute()
    {
        if ($this->hasAsal) {
            return $this->hasAsal->nama;
        }
    }

    public function hasCabang()
    {
        return $this->hasOne(Cabang::class, 'id', 'cabang_id');
    }

    public function getCabangAttribute()
    {
        if ($this->hasCabang) {
            return $this->hasCabang->nama;
        }
    }

    public function getNoHpCabangAttribute()
    {
        if ($this->hasCabang) {
            return $this->hasCabang->no_hp;
        }
    }
}