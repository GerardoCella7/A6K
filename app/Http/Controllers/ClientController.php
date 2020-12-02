<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ClientController extends Controller
{
    public function index() {
        // Chargement de la liste des clients
        $data = Client::orderBy('lastname')->get()->load('booking');

        // Affichage de la vue
        return Inertia::render('Client/Index',[
            'data' => $data
        ]);
    }

    public function details($id) {
        // Chargement de la liste des clients
        $data = Client::find($id)->load('booking');

        // Affichage de la vue
        return Inertia::render('Client/Details',[
            'data' => $data
        ]);
    }
}