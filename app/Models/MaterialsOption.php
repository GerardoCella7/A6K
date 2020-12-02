<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialsOption extends Model
{
    use HasFactory;

    public function material(){
        return $this->belongsTo(Material::class)->with('materialType');
    }
}