<?php

namespace App\Models;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Str;

class Kota extends Model
{
    use HasFactory, UsesUuid, SoftDeletes;

    protected $table = 'kota';
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

    public function hasProvinsi()
    {
        return $this->hasOne(Provinsi::class, 'id', 'provinsi_id');
    }

    public function getProvinsiAttribute()
    {
        if ($this->hasProvinsi) {
            return $this->hasProvinsi->nama;
        }
    }
}
