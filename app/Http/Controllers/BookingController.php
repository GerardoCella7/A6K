<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BookingController extends Controller
{
    public function index()
    {
        // Chargement de la liste des réservation, du client et de la salle liés
        $data = Booking::orderByDesc('start')->get()->load('client')->load('room')->load('materialOptions');

        // Affichage de la vue
        return Inertia::render('Booking/Index',[
            'data' => $data
        ]);
    }

    public function details($id)
    {
        // Chargement de la liste des réservation, du client et de la salle liés
        $data = Booking::find($id)->load('client')->load('room')->load('materialOptions');

        // Affichage de la vue
        return Inertia::render('Booking/Details',[
            'data' => $data
        ]);
    }
}