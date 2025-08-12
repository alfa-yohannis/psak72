<?php
// app/Models/BiayaPpjb.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BiayaPPJB extends Model
{
    protected $table = 'BIAYA_PPJB';
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = null; // composite
    protected $fillable = ['PPJB_ID', 'KD_BIAYA'];

    protected $casts = ['PPJB_ID' => 'integer'];

    public function ppjb()  { return $this->belongsTo(Ppjb::class, 'PPJB_ID', 'PPJB_ID'); }
    public function biaya() { return $this->belongsTo(Biaya::class, 'KD_BIAYA', 'KD_BIAYA'); }
}
