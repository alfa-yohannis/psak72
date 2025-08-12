<?php
// app/Models/Biaya.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Biaya extends Model
{
    protected $table = 'BIAYA';
    protected $primaryKey = 'KD_BIAYA';
    public $incrementing = false;
    public $timestamps = false;
    protected $keyType = 'string';

    protected $fillable = ['KD_BIAYA', 'NAMA'];

    public function biayaDp()
    {
        return $this->hasMany(BiayaDp::class, 'KD_BIAYA', 'KD_BIAYA');
    }
}
