<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Queue\InteractsWithQueue;
use Orchid\Filters\Filterable;
use Orchid\Filters\Types\Like;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Attendee extends Model implements HasMedia
{
    use Filterable;
    use HasFactory;
    use InteractsWithMedia;
    use InteractsWithQueue;

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('avatarsAttendees')
            ->width(100)
            ->height(100)
            ->sharpen(10);
    }

    protected $fillable = [
        'nombre',
        'correoElectronico',
        'empresa',
        'intereses',
        'numeroCelular',
        'feria_id',
        'stand_id',
    ];

    protected $allowedFilters = [
        'id' => Like::class,
        'nombre' => Like::class,
        'correoElectronico' => Like::class,
        'empresa' => Like::class,
        'intereses' => Like::class,
        'numeroCelular' => Like::class,
        'feria_id' => Like::class,
        'stand_id' => Like::class,

    ];

    protected $allowedSorts = [
        'id',
        'nombre',
        'correoElectronico',
        'empresa',
        'intereses',
        'numeroCelular',
        'feria_id',
        'stand_id',

    ];

    public function feria()
    {
        return $this->belongsTo(Feria::class);
    }

    public function stand()
    {
        return $this->belongsTo(Stand::class);
    }

    public function interests()
    {
        return $this->belongsToMany(Category::class, 'attendee_category', 'attendee_id', 'category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
