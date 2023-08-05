<?php

namespace App\Models;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Str;

class MetodeBayar extends Model
{
    use HasFactory, UsesUuid, SoftDeletes;

    protected $table = 'metode_bayar';
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

    public function hasBank()
    {
        return $this->belongsToMany(Bank::class, 'metode_bank')->withTimestamps();
    }

    public function getBankIdAttribute()
    {
        $data = [];
        if ($this->hasBank) {
            foreach ($this->hasBank as $key => $value) {
                $data[] =  [$value->id];
            }
        }
        return array_merge([], ...$data);
    }
    public function getBankAttribute()
    {
        $data = [];
        if ($this->hasBank) {
            foreach ($this->hasBank as $key => $value) {
                $data[$key] =  [
                    'id' => $value->id,
                    'nama' => $value->nama,
                ];
            }
        }
        return $data;
    }
}
