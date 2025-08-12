<?php
// app/Models/BiayaDp.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BiayaDp extends Model
{
    protected $table = 'BIAYA_DP';
    public $incrementing = false;
    public $timestamps = false;
    protected $primaryKey = null;

    protected $fillable = ['UANG_MUKA_ID', 'KD_BIAYA', 'NILAI'];

    public function uangMuka()
    {
        return $this->belongsTo(UangMuka::class, 'UANG_MUKA_ID', 'UANG_MUKA_ID');
    }

    public function biaya()
    {
        return $this->belongsTo(Biaya::class, 'KD_BIAYA', 'KD_BIAYA');
    }
}
