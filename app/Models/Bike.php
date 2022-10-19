<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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


    


    // public function bikeType() {
    //     return $this->belongsTo(BikeType::class);
    // }


    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }



}
