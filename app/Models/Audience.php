<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Filters\Types\Like;

class Audience extends Model
{
    protected $table = 'audience';

    use Attachable;
    use Filterable;
    use HasFactory;

    protected $fillable = [
        'name',
        'imagen_rigth',
        'image_left',
        'video_url',
    ];

    protected $allowedFilters = [
        'name' => Like::class,
    ];

    protected $allowedSort = [
        'name' => Like::class,
    ];

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
