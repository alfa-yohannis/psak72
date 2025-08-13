<?php
// app/Models/SerahTerima.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SerahTerima extends Model
{
    protected $table = 'SERAH_TERIMA';
    protected $primaryKey = 'SERAH_TERIMA_ID';
    public $timestamps = false;

    protected $fillable = [
        'PPJB_ID',
        'NO_SURAT',
        'TGL_SURAT',
        'TGL_SERAH_TERIMA',
        'NO_ST_ACC',
        'TGL_SS_ACC',
        'TGL_ENTRY_SS_ACC',
    ];

    protected $casts = [
        'PPJB_ID'            => 'integer',
        'TGL_SURAT'          => 'datetime',
        'TGL_SERAH_TERIMA'   => 'datetime',
        'TGL_SS_ACC'         => 'datetime',
        'TGL_ENTRY_SS_ACC'   => 'datetime',
    ];

    public function ppjb()
    {
        return $this->belongsTo(Ppjb::class, 'PPJB_ID', 'PPJB_ID');
    }
}
