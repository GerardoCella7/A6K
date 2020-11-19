<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RoomController extends Controller
{
    public function index(){
        $data = Room::all()->map(function ($item){
            return $item->getData();
        });
    
        return Inertia::render('Room/Index',[
            'data' => $data
        ]);
    }
}
