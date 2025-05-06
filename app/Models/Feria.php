<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeZone;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Filters\Types\Like;

class Feria extends Model
{
    use Attachable;
    use Filterable;
    use HasFactory;

    protected string $upperFormat = 'M j, Y';

    protected string $lowerFormat = 'D, h:i';

    protected DateTimeZone|null|string $tz = null;

    protected $fillable = [
        'name',
        'representative',
        'address',
        'startDate',
        'endDate', 'city',
        'category_id',
        'facebook',
        'whatsapp',
        'instagram',
        'image1',
        'image2',
        'image3',
        'image4',
        'image5',

    ];

    protected $allowedFilters = [
        'representative' => Like::class,
        'name' => Like::class,
        'address' => Like::class,
        'startDate' => Like::class,
        'endDate' => Like::class,
        'city' => Like::class,
    ];

    protected $allowedSorts = [
        'id',
        'name',
        'representative',
        'address',
        'startDate',
        'endDate',
        'city',

    ];

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

    public function stands()
    {
        return $this->hasMany(Stand::class);
    }

    // relación uno a muchos inversa con los usuarios (muchas ferias pertenecen a un usuario)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function attendees()
    {
        return $this->hasMany(Attendee::class);
    }

    public function getFormatStartDateAttribute()
    {
        $date = Carbon::parse($this->startDate, $this->tz);

        return sprintf(
            '<time class="mb-0 text-capitalize">%s<span class="text-muted d-block">%s</span></time>',
            $date->translatedFormat($this->upperFormat),
            $date->translatedFormat($this->lowerFormat),
        );
    }
}
