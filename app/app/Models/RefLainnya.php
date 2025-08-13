<?php
// app/Models/RefLainnya.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RefLainnya extends Model
{
    protected $table = 'REF_LAINNYA';
    protected $primaryKey = 'KD';
    public $incrementing = false;
    public $timestamps   = false;
    protected $keyType   = 'string';

    protected $fillable = [
        'KD',          // char(5) PK
        'DESKRIPSI',   // varchar(200) atau sesuai di DB
    ];

    /* Mutator untuk KD supaya konsisten uppercase */
    public function setKdAttribute($value): void
    {
        $this->attributes['KD'] = strtoupper((string) $value);
    }

    /* Relasi ke ANGSURAN (nullable di sisi ANGSURAN) */
    public function angsuran()
    {
        return $this->hasMany(Angsuran::class, 'KD', 'KD');
    }
}
