<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Nasabah extends Model
{
    protected $table = 'NASABAH';
    protected $primaryKey = 'NASABAH_ID';
    public $timestamps = false;

    // Atur sesuai karakteristik NASABAH_ID di DB:
    public $incrementing = true;  // set false jika tidak auto-increment
    protected $keyType = 'int';   // gunakan 'string' jika Anda menyimpan sebagai string

    protected $fillable = [
        'NASABAH_ID',
        'KD_TIPE_NASABAH',
        'NAMA',
    ];

    /** Relasi: nasabah milik satu tipe nasabah */
    public function tipeNasabah(): BelongsTo
    {
        return $this->belongsTo(TipeNasabah::class, 'KD_TIPE_NASABAH', 'KD_TIPE_NASABAH');
    }
}
