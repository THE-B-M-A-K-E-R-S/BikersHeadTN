<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reclamation extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'date',
        'satisfaction level',
    ];

    public function reclamationType(){
        return $this->belongsTo(ReclamationType::class);
    }
}
