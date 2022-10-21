<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balade_image extends Model
{
    use HasFactory;

    protected $table = 'balade_images';
    protected $fillable = [
        'balade_id',
        'image',
    ];
}
