<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Filters\Types\Like;

class Configuration extends Model
{
    use Attachable;
    use Filterable;
    use HasFactory;

    protected $fillable = [
        'name',
        'url',
        'phone',
        'email',
        'whatsapp',
        'instagram',
        'facebook',
        'image',
        'level',
        'twitter',
        'linkedin',

    ];

    protected $allowedFilters = [
        'name' => Like::class,
        'url' => Like::class,
        'phone' => Like::class,
        'email' => Like::class,
        'whatsapp' => Like::class,
        'instagram' => Like::class,
        'facebook' => Like::class,
        'level' => Like::class,
    ];

    protected $allowedSort = [
        'name',
        'url',
        'phone',
        'email',
        'whatsapp',
        'instagram',
        'facebook',
        'level',
    ];

    public function scopeLevel($query)
    {
        return $query->where('level', 1);
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($configuration) {
            // Obten la imagen asociada
            $image = $configuration->attachment()->first();

            if ($image) {
                // Elimina la imagen
                $image->delete();
            }
        });
    }
}
