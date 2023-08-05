<?php

namespace App\Models;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Str;

class AkunKas extends Model
{
    use HasFactory, UsesUuid, SoftDeletes;

    protected $table = 'akun_kas';
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
}
