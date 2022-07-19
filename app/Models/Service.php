<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    public function medecins()
    {
        return $this->hasMany(Medecin::class);
    }

    public function tarif()
    {
        return $this->belongsTo(Tarif::class);
    }
}
