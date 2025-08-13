<?php
// app/Models/PPJB.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 
class PPJB extends Model
{
    protected $table = 'PPJB';
    protected $primaryKey = 'PPJB_ID';
    public $incrementing = false;
    public $timestamps = false;
    protected $keyType = 'int';

    protected $fillable = [
        'PPJB_ID',
        'NASABAH_ID',
        'STOK_ID',
        'TIPE_BAYAR',
        'STO_STOK_ID',
        'JADWAL_ID'
    ];

    protected $casts = [
        'PPJB_ID'   => 'integer',
        'NASABAH_ID'=> 'integer',
        'STOK_ID'   => 'integer',
        'STO_STOK_ID'=> 'integer',
        'JADWAL_ID' => 'integer',
    ];

    // === Relations ===
    public function stok()
    {
        return $this->belongsTo(Stok::class, 'STOK_ID', 'STOK_ID');
    }

    public function stokLama()
    {
        return $this->belongsTo(Stok::class, 'STO_STOK_ID', 'STOK_ID');
    }

    public function tipeBayarCluster()
    {
        return $this->belongsTo(TipeBayarCluster::class, 'TIPE_BAYAR', 'TIPE_BAYAR');
    }

    public function nasabah()
    {
        return $this->belongsTo(Nasabah::class, 'NASABAH_ID', 'NASABAH_ID');
    }

    public function pembeliPPJB()
    {
        return $this->hasMany(PembeliPPJB::class, 'PPJB_ID', 'PPJB_ID');
    }

    public function kuasaPPJB()
    {
        return $this->hasMany(KuasaPPJB::class, 'PPJB_ID', 'PPJB_ID');
    }

    public function biayaPPJB()
    {
        return $this->hasMany(BiayaPPJB::class, 'PPJB_ID', 'PPJB_ID');
    }

    public function tahapBayarPPJB()
    {
        return $this->hasMany(TahapBayarPPJB::class, 'PPJB_ID', 'PPJB_ID')
            ->orderBy('TAHAP');
    }

    public function jadwalAngsuran()
    {
        return $this->hasMany(JadwalAngsuran::class, 'PPJB_ID', 'PPJB_ID')
            ->orderBy('TAHAP');
    }
}
