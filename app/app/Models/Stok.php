<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Stok extends Model
{
    protected $table = 'STOK';
    protected $primaryKey = 'STOK_ID';
    public $incrementing = false;          // set true jika STOK_ID identity
    protected $keyType = 'int';
    public $timestamps = false;

    protected $fillable = [
        'STOK_ID',
        'KD_PERUSAHAAN',
        'KD_TIPE',
        'KD_JENIS',
        'KD_LOKASI',
        'KD_TOWER',
    ];

    public function perusahaan(): BelongsTo
    {
        return $this->belongsTo(Perusahaan::class, 'KD_PERUSAHAAN', 'KD_PERUSAHAAN');
    }

    public function lokasi(): BelongsTo
    {
        return $this->belongsTo(Lokasi::class, 'KD_LOKASI', 'KD_LOKASI');
    }

    public function tower(): BelongsTo
    {
        return $this->belongsTo(Tower::class, 'KD_TOWER', 'KD_TOWER');
    }

    public function jenis(): BelongsTo
    {
        return $this->belongsTo(Jenis::class, 'KD_JENIS', 'KD_JENIS');
    }

    /**
     * BelongsTo TIPE dengan composite key (workaround):
     * gunakan foreignKey biasa untuk KD_TIPE, lalu cocokkan KD_JENIS dengan whereColumn.
     */
    public function tipe()
    {
        return $this->belongsTo(Tipe::class, 'KD_TIPE', 'KD_TIPE')
            ->whereColumn('STOK.KD_JENIS', 'TIPE.KD_JENIS');
    }
}
