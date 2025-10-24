<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Orchid\Filters\Filterable;
use Orchid\Filters\Types\Like;


class Visitor extends Authenticatable
{
    use Filterable;
    use HasFactory;
    use HasFactory;
    use Notifiable;

    protected $fillable = [
        'first_name',
        'second_name',
        'first_last_name',
        'second_last_name',
        'email',
        'gender',
        'accept_terms',
        'join_specialists_program',
        'phone',
        'nationality', //nullable
        'ip_address',
        'user_agent',
        'device',
        'session_duration',
        'geolocation', //nullable
        'password',
        'confirmation_code',
        'confirmation_code_expires_at',
        'confirmed',
        'imagen',
        'on_event',

    ];

    protected $appends = ['original_password'];

    protected $allowedFilters = [
        'first_name' => Like::class,
        'second_name' => Like::class,
        'first_last_name' => Like::class,
        'second_last_name' => Like::class,
        'email' => Like::class,
        'nationality' => Like::class,
        'phone' => Like::class,
        'gender' => Like::class,

    ];

    protected $allowedSort = [
        'name',
        'last_name',
        'email',
        'nationality',
        'phone',
        'gender',
    ];

    public function sessions()
    {
        return $this->hasMany(UserSession::class, 'visitor_id');
    }

    public function events()
    {
        return $this->belongsToMany(Event::class, 'evento_visitante', 'visitor_id', 'event_id');
    }
    public function getOriginalPasswordAttribute()
    {
        // Aquí debes implementar tu lógica para obtener la contraseña original
        // Puedes obtener la contraseña de donde la hayas almacenado originalmente
        return $this->attributes['password'];
    }
}
