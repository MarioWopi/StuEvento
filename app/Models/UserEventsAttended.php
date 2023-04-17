<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserEventsAttended extends Model
{
    use HasFactory;


    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function event()
    {
        return $this->belongsTo(Event::class, 'id');
    }

}
