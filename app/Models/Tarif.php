<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarif extends Model
{
    use HasFactory;
    protected $fillable = ['coutConsultation'];

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function rendezvous()
    {
        return $this->hasMany(Rendezvous::class);
    }
}
