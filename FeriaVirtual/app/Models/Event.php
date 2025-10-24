<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Filters\Filterable;
use Orchid\Filters\Types\Like;

class Event extends Model
{
    use HasFactory;
    use Filterable;


    protected $fillable = ['nombre', 'exhibitor_id','documents_url'];

    protected $allowedFilters = [
        'nombre' => Like::class,

    ];

    protected $allowedSort = [
        'nombre',

    ];
    public function exhibitor()
    {
        return $this->belongsTo(Exhibitor::class);
    }
    public function visitantes()
    {
        return $this->belongsToMany(Visitor::class, 'evento_visitante', 'event_id', 'visitor_id');
    }

}
