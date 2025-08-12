<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Perusahaan extends Model
{
    protected $table = 'PERUSAHAAN';
    protected $primaryKey = 'KD_PERUSAHAAN';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = ['KD_PERUSAHAAN'];

    public function sektor(): HasMany
    {
        return $this->hasMany(Sektor::class, 'KD_PERUSAHAAN', 'KD_PERUSAHAAN');
    }

    public function stok(): HasMany
    {
        return $this->hasMany(Stok::class, 'KD_PERUSAHAAN', 'KD_PERUSAHAAN');
    }
}
