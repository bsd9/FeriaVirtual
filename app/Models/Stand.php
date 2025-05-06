<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Filters\Types\Like;
use Orchid\Screen\AsSource;

class Stand extends Model
{
    use AsSource;
    use Attachable;
    use Filterable;
    use HasFactory;

    public $fillable = [
        'name',
        'descriptions',
        'logo', 'feria_id',
        'exhibitor_id',
        'facebook',
        'whatsapp',
        'instagram',
        'twitter',
        'linkedin',
        'paginaweb',
        'company_id',
        'type',
        'is_active',
        'image',
    ];

    protected $allowedFilters = [
        'id' => Like::class,
        'name' => Like::class,
        'descriptions' => Like::class,

    ];

    protected $allowedSorts = [
        'name',
        'descriptions',

    ];

    public function feria()
    {
        return $this->belongsTo(Feria::class);
    }

    public function exhibitor()
    {
        return $this->belongsTo(Exhibitor::class);
    }

    public function attendees()
    {
        return $this->hasMany(Attendee::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
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
