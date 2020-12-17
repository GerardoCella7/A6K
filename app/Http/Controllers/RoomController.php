<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RoomController extends Controller
{
    public function index(){
        // Chargement de la liste des salles et de leurs materiels de base
        $data = Room::all()->load('pictures')->load('materialsBasis');
    
        $files = [];
        foreach($data as $room){
            foreach($this->getFiles($room, 'rooms') as $key => $value){
                $files[$key] = $value;
            }
        }

        // Affichage de la vue
        return Inertia::render('Room/Index',[
            'data' => $data,
            'files' => $files
        ]);
    }

    public function details(int $id){
        // Chargement de la salle et de la liste du materiel de base
        $data = Room::find($id)->load('pictures')->load('materialsBasis');
    
        $files = $this->getFiles($data, 'rooms');

        // Affichage de la vue
        return Inertia::render('Room/Details',[
            'data' => $data,
            'files' => $files
        ]);
    }
}