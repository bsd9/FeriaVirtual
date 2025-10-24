<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Filters\Filterable;
use Orchid\Filters\Types\Like;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class FacadeScreenFront extends Model implements HasMedia
{
    use Filterable;
    use HasFactory;
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = [
        'position',
        'nombre',
    ];

    protected $allowedFilters = [
        'nombre' => Like::class,
    ];

    protected $allowedSorts = [
        'nombre',
    ];

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaCollection('publicidad1');
    }
}
