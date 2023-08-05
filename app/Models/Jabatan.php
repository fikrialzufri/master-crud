<?php

namespace App\Models;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Str;

class Jabatan extends Model
{
    use HasFactory, UsesUuid, SoftDeletes;

    protected $table = 'jabatan';
    protected $guarded = ['id'];
    protected $fillable = [
        'nama',
        'diskripsi',
        'kode',
        'include_kendaraan',
        'include_pelanggan',
    ];

    public function setNamaAttribute($value)
    {
        $this->attributes['nama'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function hasKaryawan()
    {
        return $this->hasMany(Karyawan::class, 'jabatan_id');
    }

    public function getKaryawanAttribute()
    {
        // has many relationship
        $data = [];
        if ($this->hasKaryawan) {
            foreach ($this->hasKaryawan as $key => $value) {
                $data[] =  $value->nama;
            }
        }

        return $data;
    }
}
