<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialsBasis extends Model
{
    use HasFactory;

    public function getData(){
        $material = Material::where('id', $this->attributes['material_id'])->get();       

        $this->attributes['material'] = $material;
        
        return $this->attributes;
    }
}
