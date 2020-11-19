<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BookingController extends Controller
{
    public function index()
    {
        $data = Booking::all()->map(function ($item){
            return $item->getData();
        });

        return Inertia::render('Booking/Index',[
            'data' => $data
        ]);
    }
}
