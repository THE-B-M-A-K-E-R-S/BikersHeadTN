<?php

namespace App\Models;

use App\Models\Image;
use App\Models\BikeType;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bike extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'color',
        'brand',
        'model',
        'type',
        'size',
        'price',
        'description',
    ];



    public function images()
    {
        return $this->hasMany(Image::class, 'bike_id', 'id');
    }




    public function bikeType()
    {
        return $this->belongsTo(BikeType::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
