<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Jenis extends Model
{
    protected $table = 'JENIS';
    protected $primaryKey = 'KD_JENIS';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = ['KD_JENIS'];

    public function tipe(): HasMany
    {
        return $this->hasMany(Tipe::class, 'KD_JENIS', 'KD_JENIS');
    }

    // opsional: akses stok berdasarkan kolom KD_JENIS pada STOK
    public function stok(): HasMany
    {
        return $this->hasMany(Stok::class, 'KD_JENIS', 'KD_JENIS');
    }
}
