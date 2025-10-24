<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Filters\Types\Like;

class Popups extends Model
{
    use Attachable;
    use Filterable;
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'active',
        'image',
    ];

    protected $allowedFilters = [
        'title' => Like::class,
        'content' => Like::class,
        'active' => Like::class,

    ];

    protected $allowedSort = [
        'title' => Like::class,
        'content' => Like::class,
        'active' => Like::class,

    ];
    // public function getActiveAttribute()
    // {
    //     return $this->attributes['active'] ? 'Activo' : 'Inactivo';
    // }

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($delete) {
            // Obten la imagen asociada
            $image = $delete->attachment()->first();

            if ($image) {
                // Elimina la imagen
                $image->delete();
            }
        });
    }
}
