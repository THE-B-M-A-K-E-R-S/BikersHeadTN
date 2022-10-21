<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event_image extends Model
{
    use HasFactory;

    protected $table = 'Event_image';
    protected $fillable = [
        'event_id',
        'image',
    ];
}
