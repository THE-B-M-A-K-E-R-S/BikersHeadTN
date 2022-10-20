<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssociationType extends Model
{
    use HasFactory;

    public function associations() {
        return $this->hasMany(Association::class);
    }
}
