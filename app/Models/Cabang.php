<?php

namespace App\Models;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Str;

class Cabang extends Model
{
    use HasFactory, UsesUuid, SoftDeletes;

    protected $table = 'cabang';
    protected $guarded = ['id'];
    protected $fillable = [
        'kode',
        'kode_resi',
        'nama',
        'alamat',
        'no_hp',
        'kirim_barang',
        'terima_barang',
        'kota_id',
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
}
