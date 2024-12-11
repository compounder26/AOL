<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserEvent extends Model
{
    use HasFactory;
    protected $table = 'user_events';
    protected $fillable = [
        'user_id',
        'event_id',
    ];
    protected $hidden = [
        'updated_at'
    ];

    public function events()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
