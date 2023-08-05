<?php

namespace App\Models;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Str;

class Pelanggan extends Model
{
    use HasFactory, UsesUuid, SoftDeletes;

    protected $table = 'pelanggan';
    protected $guarded = ['id'];

    // protected $appends = ['plafon'];
    protected $fillable = [
        'kode',
        'nama',
        'alamat',
        'no_hp',
        'nik',
        'kredit',
        'limit',
        'jenis_kelamin',
        'cabang_id',
        'kota_id',
        'jenis_pelanggan',
        'sales_id',
    ];

    public function setKodeAttribute($value)
    {
        $this->attributes['kode'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function hasKota()
    {
        return $this->hasOne(Kota::class, 'kota_id');
    }

    public function getKotaAttribute()
    {
        if ($this->hasKota) {
            return $this->hasKota->nama;
        }
    }

    public function hasCabang()
    {
        return $this->hasOne(Cabang::class, 'cabang_id');
    }

    public function getCabangAttribute()
    {
        if ($this->hasCabang) {
            return $this->hasCabang->nama;
        }
    }

    public function hasSales()
    {
        return $this->hasOne(Karyawan::class, 'id', 'sales_id');
    }

    public function getSalesAttribute()
    {
        if ($this->hasSales) {
            return $this->hasSales->nama;
        }
    }

    public static function boot()
    {
        parent::boot();

        // bikin Kode autoamasi

        self::creating(function ($model) {
            $countModel = $model->withTrashed()->count();
            if ($countModel >= 1) {
                $no = str_pad($countModel + 1, 4, "0", STR_PAD_LEFT);
                $kode = "P-SC-" . $no . "-" . rand(0, 900);
            } else {
                $no = str_pad(1, 4, "0", STR_PAD_LEFT);
                $kode = "P-SC-" . $no . "-" . rand(0, 900);
            }
            $model->kode = $kode;
        });
    }


    public function hasPiutang()
    {
        return $this->hasMany(Piutang::class, 'pelanggan_id');
    }

    public function getTotalTransaksiAttribute()
    {
        if ($this->hasPiutang) {
            return $this->hasPiutang->where('pelanggan_id', $this->id)->sum('total_transaksi');
        }
    }
    public function getTotalBayarAttribute()
    {
        if ($this->hasPiutang) {
            return $this->hasPiutang->where('pelanggan_id', $this->id)->sum('total_bayar');
        }
    }

    public function getPlafonAttribute()
    {

        $plafon = $this->limit;
        if ($this->limit > 0) {
            $plafon = $this->limit - $this->total_piutang;
        }
        return $plafon;
    }

    public function getTotalPiutangAttribute()
    {

        $total_piutang = 0;
        if ($this->hasPiutang) {
            $total_bayar = $this->total_bayar;
            $total_transaksi = $this->total_transaksi;
            $total_piutang = $total_transaksi - $total_bayar;
        }
        return $total_piutang;
    }

    function scopePiutang($query)
    {
        $query->with('hasPiutang')->whereHas('hasPiutang', function ($q) {
            $q->where('pelanggan_id', '!=', '');
            $q->where('status', '0');
        });
    }

    function scopeHutang($query)
    {
        $query->with('hasHutang')->whereHas('hasHutang', function ($q) {
            $q->where('vendor_id', '!=', '');
            $q->where('status', '0');
        });
    }

    public function hasHutang()
    {
        return $this->hasMany(Hutang::class, 'vendor_id');
    }

    public function getTotalHutangAttribute()
    {

        $total_hutang = 0;
        if ($this->hasHutang) {
            $total_bayar = $this->total_bayar_hutang;
            $total_transaksi = $this->total_transaksi_hutang;
            $total_hutang = $total_transaksi - $total_bayar;
        }
        return $total_hutang;
    }
    public function getTotalTransaksiHutangAttribute()
    {
        if ($this->hasHutang) {
            return $this->hasHutang->where('vendor_id', $this->id)->sum('total_transaksi');
        }
    }

    public function getTotalBayarHutangAttribute()
    {
        if ($this->hasHutang) {
            return $this->hasHutang->where('vendor_id', $this->id)->sum('total_bayar');
        }
    }

    public function hasPengirimanBarangKirim()
    {
        return $this->hasMany(PengirimanBarang::class, 'pengirim_kirim_id');
    }

    public function hasPengirimanBarangPenerima()
    {
        return $this->hasMany(PengirimanBarang::class, 'penerima_kirim_id');
    }

    public function getTotalPengirimanBarangAttribute()
    {
        if ($this->hasPengirimanBarangPenerima) {
            return $this->hasPengirimanBarangPenerima->count();
        }
    }


}
