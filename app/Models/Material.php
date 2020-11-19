<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    public function getData(){
        $type = MaterialType::where('id', $this->attributes['material_type_id'])->get();

        $this->attributes['materialType'] = $type[0]->getAttributes();
        
        return $this->attributes;
    }
}
