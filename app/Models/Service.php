<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['nomService', 'tarif_id'];

    public function medecins()
    {
        return $this->hasMany(Medecin::class);
    }

    public function tarif()
    {
        return $this->belongsTo(Tarif::class);
    }
}
