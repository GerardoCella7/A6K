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
        $data = Booking::all()->load('client')->load('room');

        // Affichage de la vue
        return Inertia::render('Booking/Index',[
            'data' => $data
        ]);
    }
}