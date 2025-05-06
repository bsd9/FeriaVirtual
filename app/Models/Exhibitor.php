<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Filters\Types\Like;
use Orchid\Screen\AsSource;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Exhibitor extends Model
{
    use AsSource;
    use Attachable;
    use Filterable;
    use HasFactory;

    protected $fillable = ['name', 'description', 'website', 'image'];

    protected $allowedFilters = [

        'name' => Like::class,
        'description' => Like::class,
    ];

    protected $allowedSorts = [
        'name',
        'descriptions',

    ];

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(368)
            ->height(232)
            ->sharpen(10);
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($image) {
            // Obten la imagen asociada
            $image = $image->attachment()->first();

            if ($image) {
                // Elimina la imagen
                $image->delete();
            }
        });
    }

    public function stand()
    {
        return $this->hasOne(Stand::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function events()
    {
        return $this->hasMany(Event::class, 'event_id');
    }
}
