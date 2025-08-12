<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tower extends Model
{
    protected $table = 'TBL_TOWER';
    protected $primaryKey = 'KD_TOWER';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = ['KD_TOWER'];

    public function stok(): HasMany
    {
        return $this->hasMany(Stok::class, 'KD_TOWER', 'KD_TOWER');
    }
}
