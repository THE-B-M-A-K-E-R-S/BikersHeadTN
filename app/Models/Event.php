<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;


    protected $fillable = [
        'title',
        'description',
        'location',
        'event_type_id',
        'date',
    ];


    public function images()
    {
        return $this->hasMany(Event_image::class, 'event_id', 'id');
    }


    public function eventType() {
        return $this->belongsTo(EventType::class);
    }
}
