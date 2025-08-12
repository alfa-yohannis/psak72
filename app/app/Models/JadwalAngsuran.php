<?php
// app/Models/JadwalAngsuran.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalAngsuran extends Model
{
    protected $table = 'JADWAL_ANGSURAN';
    protected $primaryKey = 'JADWAL_ID'; // bigIncrements
    public $timestamps = false;

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
