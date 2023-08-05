<?php

namespace App\Models;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SuratJalan extends Model
{
    use HasFactory, UsesUuid, SoftDeletes;

    protected $table = 'surat_jalan';
    protected $guarded = ['id'];

    public function hasKota()
    {

        return $this->belongsToMany(Kota::class, 'surat_jalan_kota');
    }

    public function hasAnyKota(...$kotas)
    {

        foreach ($kotas as $kota) {
            if ($this->hasKota->contains('nama', $kota)) {
                return true;
            }
        }
        return false;
    }


    public function getKotaAttribute()
    {
        $listKota = [];
        if ($this->hasKota()) {
            $listKota = $this->hasKota()->pluck('nama');
            # code...
        }
        return implode(', ', $listKota->toArray());
        ;
    }

    public function getKaryawanAttribute()
    {
        if ($this->hasKaryawan) {
            return $this->hasKaryawan->nama;
        }
    }


    public function hasKaryawan()
    {
        return $this->hasOne(Karyawan::class, 'id', 'karyawan_id');
    }

    public function getTotalKoliAttribute()
    {
        return 0;
    }

}