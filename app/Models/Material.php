<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    // Récupération du type associé
    public function materialType(){
        return $this->belongsTo(MaterialType::class);
    }

    // Récupération de la liste de photos
    public function pictures(){
        return $this->hasMany(PicturesMaterial::class);
    }
}
