<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialsBasis extends Model
{
    use HasFactory;

    // Récupération du materiel associé et de son type
    public function material(){
        return $this->belongsTo(Material::class)->with('materialType');
    }
}
