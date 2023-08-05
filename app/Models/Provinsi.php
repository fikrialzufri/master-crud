<?php

namespace App\Models;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Str;

class Provinsi extends Model
{
    use HasFactory, UsesUuid, SoftDeletes;

    protected $table = 'provinsi';
    protected $guarded = ['id'];
    protected $fillable = [
        'nama',
        'diskripsi',
        'kode',
    ];

    public function setNamaAttribute($value)
    {
        $this->attributes['nama'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function hasKota()
    {
        return $this->hasMany(Kota::class, 'provinsi_id');
    }

    public function getKotaAttribute()
    {
        // has many relationship
        $data = [];
        if ($this->hasKota) {
            foreach ($this->hasKota as $key => $value) {
                $data[] =  $value->nama;
            }
        }

        return $data;
    }
}
