<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;
use Orchid\Filters\Filterable;
use Orchid\Filters\Types\Like;

class Pavilion extends Model
{
    use AsSource, Filterable;

    protected $fillable = ['name', 'description'];

    protected $allowedFilters = [
        'name' => Like::class,
    ];

    protected $allowedSorts = ['name'];
}