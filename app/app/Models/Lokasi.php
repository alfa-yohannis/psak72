<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lokasi extends Model
{
    protected $table = 'LOKASI';
    protected $primaryKey = 'KD_LOKASI';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = ['KD_LOKASI'];

    public function stok(): HasMany
    {
        return $this->hasMany(Stok::class, 'KD_LOKASI', 'KD_LOKASI');
    }
}
