<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rendezvous extends Model
{
    use HasFactory;

    public function tarif()
    {
        return $this->belongsTo(Tarif::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function proche()
    {
        return $this->belongsTo(Proche::class);
    }

    public function medecin()
    {
        return $this->belongsTo(Medecin::class);
    }
}
