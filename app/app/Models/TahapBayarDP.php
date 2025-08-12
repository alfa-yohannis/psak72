<?php
// app/Models/TahapBayarDP.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TahapBayarDP extends Model
{
    protected $table = 'TAHAP_BAYAR_DP';
    public $incrementing = false;
    public $timestamps = false;
    protected $primaryKey = null; // composite key

    protected $fillable = ['UANG_MUKA_ID', 'TAHAP', 'TGL_JATUH_TEMPO'];

    public function uangMuka()
    {
        return $this->belongsTo(UangMuka::class, 'UANG_MUKA_ID', 'UANG_MUKA_ID');
    }
}
