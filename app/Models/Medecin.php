<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medecin extends Model
{
    use HasFactory;

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function jourDeService()
    {
        return $this->belongsTo(JourDeService::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
    public function rendezvous()
    {
        return $this->hasMany(Rendezvous::class);
    }
}
