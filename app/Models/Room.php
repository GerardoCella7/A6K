<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    public function getData(){
        $materialBasis = MaterialsBasis::where('room_id', $this->attributes['id'])->get();
        $pictures = PictureRoom::where('room_id', $this->attributes['id'])->get();

        foreach ($materialBasis as $item) {
            $material = Material::where('id', $item->material_id)->get();
            $item['materialInfo'] = $material[0]->getData();
        }

        $this->attributes['materialBasis'] = $materialBasis;
        $this->attributes['pictures'] = $pictures;
        
        return $this->attributes;
    }
}
