<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSession extends Model
{
    use HasFactory;
    protected $table = 'user_sessions';
    protected $fillable = ['visitor_id', 'session_id'];

    public function visitor()
    {
        return $this->belongsTo(Visitor::class, 'visitor_id');
    }
}
