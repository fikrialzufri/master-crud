<?php

namespace App\Models;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Str;

class Karyawan extends Model
{
    use HasFactory, UsesUuid, SoftDeletes;

    protected $table = 'karyawan';
    protected $guarded = ['id'];
    protected $fillable = [
        'nama',
        'diskripsi',
        'kode',
        'jabatan_id',
        'user_id',
        'cabang_id',
        'kendaraan_id',
    ];

    public function setNamaAttribute($value)
    {
        $this->attributes['nama'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
    public function hasJabatan()
    {
        return $this->hasOne(Jabatan::class, 'id', 'jabatan_id');
    }

    public function getJabatanAttribute()
    {
        if ($this->hasJabatan) {
            return $this->hasJabatan->nama;
        }
    }
    public function hasCabang()
    {
        return $this->hasOne(Cabang::class, 'id', 'cabang_id');
    }
    public function hasUser()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    // get username from user
    public function getUsernameAttribute()
    {
        if ($this->hasUser) {
            return $this->hasUser->username;
        }
    }
    // get email from user

    public function getEmailAttribute()
    {
        if ($this->hasUser) {
            return $this->hasUser->email;
        }
    }

    public function getCabangAttribute()
    {
        if ($this->hasCabang) {
            return $this->hasCabang->nama;
        }
    }

    // Relasi Kendaraan
    public function hasKendaraan()
    {
        return $this->hasOne(Kendaraan::class, 'id', 'kendaraan_id');
    }

    // Get nopol from kendaraan
    public function getKendaraanAttribute()
    {
        if ($this->hasKendaraan) {
            return $this->hasKendaraan->nopol;
        }
    }
}
