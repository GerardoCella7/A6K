<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $clients = Client::all()->toArray();
        return array_reverse($clients);
    }
}
