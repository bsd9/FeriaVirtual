<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Filters\Types\Like;

class Blog extends Model
{
    use Attachable;
    use Filterable;
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'slug',
        'status',
        'featured_image',
    ];

    protected $allowedFilters = [
        'title' => Like::class,
        'content' => Like::class,
        'slug' => Like::class,
        'status' => Like::class,
    ];

    protected $allowedSort = [
        'title',
        'content',
        'slug',
        'status',
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
