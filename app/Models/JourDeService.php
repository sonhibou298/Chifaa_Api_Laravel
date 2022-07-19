<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JourDeService extends Model
{
    use HasFactory;

    public function medecins(){
        return $this->hasMany(Medecin::class);
    }
}
