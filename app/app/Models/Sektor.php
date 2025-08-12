<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sektor extends Model
{
    protected $table = 'SEKTOR';
    protected $primaryKey = 'KD_SEKTOR';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = ['KD_SEKTOR','KD_PERUSAHAAN'];

    public function perusahaan(): BelongsTo
    {
        return $this->belongsTo(Perusahaan::class, 'KD_PERUSAHAAN', 'KD_PERUSAHAAN');
    }

    public function modelUnit(): HasMany
    {
        return $this->hasMany(ModelUnit::class, 'KD_SEKTOR', 'KD_SEKTOR');
    }
}
