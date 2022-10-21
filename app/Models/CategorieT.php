<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategorieT extends Model
{
    use HasFactory;
    protected $fillable = ['type'];
    // public function Trotinettes(){
    //     return $this->hasMany(Trotinette::class);
    // }

    public function trotinettes(){
        return $this->hasMany(Trotinette::class);
    }

}
