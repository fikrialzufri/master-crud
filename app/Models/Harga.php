<?php

namespace App\Models;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Str;

class Harga extends Model
{
    use HasFactory, UsesUuid, SoftDeletes;

    protected $table = 'harga';
    protected $guarded = ['id'];
    protected $fillable = [
        'kode',
        'nama',
        'min_berat',
        'asal_kota_id',
        'harga',
        'jarak',
        'tujuan_kota_id',
        'cabang_id',
    ];

    public function setKodeAttribute($value)
    {
        $this->attributes['kode'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function hasCabang()
    {
        return $this->hasOne(Cabang::class, 'Cabang_id');
    }

    public function getCabangAttribute()
    {
        if ($this->hasCabang) {
            return $this->hasCabang->nama;
        }
    }

    // many to many harga to kota
    public function hasHargaDetail()
    {
        return $this->hasMany(HargaDetail::class, 'harga_id');
    }
    // get harga detail
    public function getHargaDetailAttribute()
    {
        $data = [];
        if ($this->hasHargaDetail) {
            // orderby berat asc
            $hasHargaDetail = $this->hasHargaDetail->sortBy('berat');
            foreach ($hasHargaDetail as $item) {
                $data[] = [
                    'id' => $item->id,
                    'berat' => $item->berat,
                    'harga' => format_uang($item->harga),
                    'asal_kota_id' => $item->asal_kota_id,
                    'tujuan_kota_id' => $item->tujuan_kota_id,
                    'cabang_id' => $item->cabang_id,
                    'harga_id' => $item->harga_id,
                    'asal_kota' => $item->asal_kota,
                    'tujuan_kota' => $item->tujuan_kota,
                    'cabang' => $item->cabang,
                ];
            }
        }

        return $data;
    }

    public function hasAsalKota()
    {
        return $this->hasOne(Kota::class, 'id', 'asal_kota_id');
    }
    // has tujuan kota

    public function hasTujuanKota()
    {
        return $this->hasOne(Kota::class, 'id', 'tujuan_kota_id');
    }

    // has kota asal
    public function getTujuanKotaAttribute()
    {
        if ($this->hasTujuanKota) {
            return $this->hasTujuanKota->nama;
        }
    }
    // asal kota
    public function getAsalKotaAttribute()
    {
        if ($this->hasAsalKota) {
            return $this->hasAsalKota->nama;
        }
    }
}
