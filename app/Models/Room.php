<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    // Récupération de la liste de photos de la salle
    public function pictures(){
        return $this->hasMany(PictureRoom::class);
    }

    // Récupération de la liste du materiel de base
    public function materialsBasis(){
        return $this->hasMany(MaterialsBasis::class)->with('material');
    }
}
