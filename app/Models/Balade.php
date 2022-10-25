<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balade extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'date',
        'place',
        'distance',
        'duration',
        'max_participants',
        'difficulty',
        'balade_type_id',
    ];

    public function baladeType() {
        return $this->belongsTo(BaladeType::class);
    }

    public function images()
    {
        return $this->hasMany(Balade_image::class, 'balade_id', 'id');
    }

    public function users(){
        return $this->belongsToMany(User::class, 'user_balade', 'balade_id', 'user_id');
    }
}
