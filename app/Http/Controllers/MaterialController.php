<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MaterialController extends Controller
{
    public function index() {
        $data = Material::all()->map(function ($item){
            return $item->getData();
        });

        return Inertia::render('Material/Index',[
            'data' => $data
        ]);
    }
}
