<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PavilionStandType extends Model
{
    protected $fillable = ['pavilion_id', 'stand_type', 'max_stands'];

    public function pavilion(): BelongsTo
    {
        return $this->belongsTo(Pavilion::class);
    }
}