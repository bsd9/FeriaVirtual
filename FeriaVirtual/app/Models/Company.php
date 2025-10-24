<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Filters\Types\Like;

class Company extends Model
{
    use Attachable;
    use Filterable;
    use HasFactory;

    public $fillable = [
        'company',
        'description',
        'facebook',
        'instagram',
        'whatsapp',
        'twitter',
        'pagina_web',
        'ifrema',
        'linkedin',
        'image',
        'miniatura',
        'ifrema_3',
        'ifrema_2',
    ];

    protected $allowedFilters = [
        'id' => Like::class,
        'company' => Like::class,
    ];

    protected $allowedSorts = [
        'company',
    ];

    public function stand()
    {
        return $this->hasOne(Stand::class);
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
