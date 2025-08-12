<?php
// app/Models/TipeBayarCluster.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipeBayarCluster extends Model
{
    protected $table = 'TIPE_BAYAR_CLUSTER';
    protected $primaryKey = 'TIPE_BAYAR';
    public $incrementing = false;
    public $timestamps = false;
    protected $keyType = 'string';

    protected $fillable = ['TIPE_BAYAR'];

    public function uangMuka()
    {
        return $this->hasMany(UangMuka::class, 'TIPE_BAYAR_ANGS', 'TIPE_BAYAR');
    }
}
