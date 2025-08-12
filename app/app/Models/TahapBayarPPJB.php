<?php
// app/Models/TahapBayarPpjb.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TahapBayarPPJB extends Model
{
    protected $table = 'TAHAP_BAYAR_PPJB';
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = null; // composite
    protected $fillable = ['PPJB_ID', 'TAHAP', 'TGL_JATUH_TEMPO'];

    protected $casts = [
        'PPJB_ID' => 'integer',
        'TGL_JATUH_TEMPO' => 'datetime',
    ];

    public function ppjb()
    {
        return $this->belongsTo(Ppjb::class, 'PPJB_ID', 'PPJB_ID');
    }
}
