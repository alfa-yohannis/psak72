<?php
// app/Models/UangMuka.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UangMuka extends Model
{
    protected $table = 'UANG_MUKA';
    protected $primaryKey = 'UANG_MUKA_ID';
    public $incrementing = false;
    public $timestamps = false;
    protected $keyType = 'int';

    protected $fillable = [
        'UANG_MUKA_ID', 'STOK_ID', 'TIPE_BAYAR_ANGS', 'TAHAP',
        'FLAG_AKTIF', 'FLAG_BATAL', 'STATUS'
    ];

    // Default nilai flag sesuai aturan
    protected $attributes = [
        'FLAG_AKTIF' => 'A',  // A=Aktif, T=Tidak
        'FLAG_BATAL' => null, // Y=Batal, T/NULL=Tidak
        'STATUS'     => null, // NULL/T=Open, V=Siap Approve, A=Approve
    ];

    // Cast kolom numerik
    protected $casts = [
        'UANG_MUKA_ID' => 'integer',
        'STOK_ID'      => 'integer',
    ];

    public function stok()
    {
        return $this->belongsTo(Stok::class, 'STOK_ID', 'STOK_ID');
    }

    public function tipeBayarCluster()
    {
        return $this->belongsTo(TipeBayarCluster::class, 'TIPE_BAYAR_ANGS', 'TIPE_BAYAR');
    }

    public function tahapBayarDp()
    {
        return $this->hasMany(TahapBayarDp::class, 'UANG_MUKA_ID', 'UANG_MUKA_ID');
    }

    public function bayarUangMuka()
    {
        // Urutkan berdasarkan nomor baris (TAHAP)
        return $this->hasMany(BayarUangMuka::class, 'UANG_MUKA_ID', 'UANG_MUKA_ID')
                    ->orderBy('TAHAP');
    }

    public function pembeliDp()
    {
        return $this->hasMany(PembeliDp::class, 'UANG_MUKA_ID', 'UANG_MUKA_ID');
    }

    public function kuasaDp()
    {
        return $this->hasMany(KuasaDp::class, 'UANG_MUKA_ID', 'UANG_MUKA_ID');
    }

    public function biayaDp()
    {
        return $this->hasMany(BiayaDp::class, 'UANG_MUKA_ID', 'UANG_MUKA_ID');
    }
}
