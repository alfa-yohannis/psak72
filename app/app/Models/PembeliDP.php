<?php
// app/Models/PembeliDP.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PembeliDP extends Model
{
    protected $table = 'PEMBELI_DP';
    public $incrementing = false;
    public $timestamps = false;
    protected $primaryKey = null;

    protected $fillable = ['UANG_MUKA_ID', 'NASABAH_ID', 'KETERANGAN'];

    public function uangMuka()
    {
        return $this->belongsTo(UangMuka::class, 'UANG_MUKA_ID', 'UANG_MUKA_ID');
    }

    public function nasabah()
    {
        return $this->belongsTo(Nasabah::class, 'NASABAH_ID', 'NASABAH_ID');
    }
}
