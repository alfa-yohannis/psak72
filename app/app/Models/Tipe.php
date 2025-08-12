<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tipe extends Model
{
    protected $table = 'TIPE';

    // Eloquent tidak mendukung composite PK; pilih salah satu sebagai keyName
    protected $primaryKey = 'KD_TIPE';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = ['KD_TIPE','KD_JENIS'];

    public function jenis(): BelongsTo
    {
        return $this->belongsTo(Jenis::class, 'KD_JENIS', 'KD_JENIS');
    }

    /** Relasi ke STOK menggunakan pasangan kolom (workaround) */
    public function stok(): HasMany
    {
        return $this->hasMany(Stok::class, 'KD_TIPE', 'KD_TIPE')
            ->whereColumn('STOK.KD_JENIS', 'TIPE.KD_JENIS');
    }
}
