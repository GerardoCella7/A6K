<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    public function booking(){
        return $this->hasMany(Booking::class)->orderByDesc('start')->with('materialOptions')->with('room');
    }
}
