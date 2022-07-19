<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function proches()
    {
        return $this->hasMany(Proche::class);
    }

    public function rendezvous()
    {
        return $this->hasMany(Rendezvous::class);
    }
}
