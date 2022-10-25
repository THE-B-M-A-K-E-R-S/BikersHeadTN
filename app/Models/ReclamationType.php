<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReclamationType extends Model
{
    use HasFactory;

    protected $fillable = [
        'label'
    ];

    public function reclamations(){
        return $this->hasMany(Reclamation::class);
    }
}
