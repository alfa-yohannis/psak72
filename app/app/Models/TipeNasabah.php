<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TipeNasabah extends Model
{
    protected $table = 'TIPE_NASABAH';
    protected $primaryKey = 'KD_TIPE_NASABAH';
    public $incrementing = false;          // PK char(2)
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'KD_TIPE_NASABAH',
        'DESKRIPSI',
    ];

    /** Relasi: satu tipe punya banyak nasabah */
    public function nasabah(): HasMany
    {
        return $this->hasMany(Nasabah::class, 'KD_TIPE_NASABAH', 'KD_TIPE_NASABAH');
    }
}
