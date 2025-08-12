<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as EloquentModel; // hindari konflik nama "Model"
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ModelUnit extends EloquentModel
{
    protected $table = 'MODEL';
    protected $primaryKey = 'KD_MODEL';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = ['KD_MODEL','KD_SEKTOR'];

    public function sektor(): BelongsTo
    {
        return $this->belongsTo(Sektor::class, 'KD_SEKTOR', 'KD_SEKTOR');
    }
}
