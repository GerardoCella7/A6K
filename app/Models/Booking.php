<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    // Récupération du client associé
    public function client(){
        return $this->belongsTo(Client::class);
    }

    // Récupération de la salle associée
    public function room(){
        return $this->belongsTo(Room::class)->with('materialsBasis');
    }

    public function materialOptions(){
        return $this->hasMany(MaterialsOption::class)->with('material');
    }
}
