<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Filters\Filterable;
use Orchid\Filters\Types\Like;

class Category extends Model
{
    use Filterable;
    use HasFactory;

    public $fillable = ['name', 'description'];

    protected $allowedFilters = [
        'name' => Like::class,
        'description' => Like::class,
    ];

    protected $allowedSort = [
        'name',
        'description',
    ];

    public function ferias()
    {
        return $this->hasMany(Feria::class);
    }

    public function attendees()
    {
        return $this->belongsToMany(Attendee::class, 'attendee_category', 'category_id', 'attendee_id');
    }
}
