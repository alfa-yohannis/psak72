<?php
// app/Models/KuasaPpjb.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KuasaPPJB extends Model
{
    protected $table = 'KUASA_PPJB';
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = null; // composite
    protected $fillable = ['PPJB_ID', 'NASABAH_ID'];

    protected $casts = [
        'PPJB_ID' => 'integer',
        'NASABAH_ID' => 'integer',
    ];

    public function ppjb()    { return $this->belongsTo(Ppjb::class, 'PPJB_ID', 'PPJB_ID'); }
    public function nasabah() { return $this->belongsTo(Nasabah::class, 'NASABAH_ID', 'NASABAH_ID'); }
}
