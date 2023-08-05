<?php

namespace App\Models;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Str;

class Kendaraan extends Model
{
    use HasFactory, UsesUuid, SoftDeletes;

    protected $table = 'kendaraan';
    protected $guarded = ['id'];
    protected $fillable = [
        'nopol',
        'kapasitas',
    ];

    // Set nopol as name
    public function getNamaAttribute()
    {
        return $this->attributes['nopol'];
    }

    public function setNopolAttribute($value)
    {
        $this->attributes['nopol'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function hasKaryawan()
    {
        return $this->hasMany(Karyawan::class, 'kendaraan_id');
    }

    public function getKaryawanAttribute()
    {
        // has many relationship
        $data = [];
        if ($this->hasKaryawan) {
            foreach ($this->hasKaryawan as $key => $value) {
                $data[] = $value->nama;
            }
        }

        return $data;
    }

    public function getKapasitasKgAttribute()
    {
        return format_uang($this->kapasitas) . ' Kg';
    }
}