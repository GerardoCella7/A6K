<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MaterialController extends Controller
{
    public function index() {
        // Chargement de la liste de materiel, du type et la liste d'images
        $data = Material::all()->load('materialType')->load('pictures');

        // Affichage de la vue
        return Inertia::render('Material/Index',[
            'data' => $data
        ]);
    }
}