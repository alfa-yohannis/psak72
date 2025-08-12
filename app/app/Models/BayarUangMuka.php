<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BayarUangMuka extends Model
{
    protected $table = 'BAYAR_UANG_MUKA';

    // Tidak ada auto increment karena composite key
    public $incrementing = false;
    public $timestamps = false;

    // Laravel tidak mendukung composite key langsung
    protected $primaryKey = null;

    // Kolom yang bisa diisi
    protected $fillable = [
        'UANG_MUKA_ID', // numeric(18) PK, FK ke UANG_MUKA
        'TAHAP',        // numeric(3) PK (line number)
    ];

    protected $casts = [
        'UANG_MUKA_ID' => 'integer',
        'TAHAP'        => 'integer',
    ];

    public function uangMuka()
    {
        return $this->belongsTo(UangMuka::class, 'UANG_MUKA_ID', 'UANG_MUKA_ID');
    }
}
