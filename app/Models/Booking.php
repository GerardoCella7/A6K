<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    
    public function getData(){
        $client = Client::where('id', $this->attributes['client_id'])->get();
        $room = Room::where('id', $this->attributes['room_id'])->get();

        $this->attributes['client'] = $client[0]->getAttributes();
        $this->attributes['room'] = $room[0]->getAttributes();
        
        return $this->attributes;
    }
}
