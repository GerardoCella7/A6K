<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\MaterialType;
use App\Models\PicturesMaterial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class MaterialController extends Controller
{
    public function index() {
        // Chargement de la liste de materiel, du type et la liste d'images
        $data = Material::all()->load('materialType')->load('pictures');

        $files = [];
        foreach($data as $material){
            foreach($this->getFiles($material, 'materials') as $key => $value){
                $files[$key] = $value;
            }
        }
        // Affichage de la vue
        return Inertia::render('Material/Index',[
            'data' => $data,
            'files' => $files
        ]);
    }

    public function details(int $id) {
        // Chargement de la liste de materiel, du type et la liste d'images
        $data = Material::find($id)->load('materialType')->load('pictures');

        $files = $this->getFiles($data, 'materials');
        
        // Affichage de la vue
        return Inertia::render('Material/Details',[
            'data' => $data,
            'files' => $files
        ]);
    }

    public function create() {
        $data = MaterialType::all();
        // Affichage de la vue
        return Inertia::render('Material/Create',[
            'data' => $data
        ]);
    }

    public function store(Request $request) {

        $request->validate([
            'name' => 'required', 
            'description' => 'required', 
            'price' => 'required', 
            'quantity' => 'required', 
            'material_type_id' => 'required'
        ]);

        $info = $request->all();

        $info['price'] *= 100;
        $materiel = Material::create($info);

        
        for($i=0; $i < $info['nb_files']; $i++){

            // TODO: Verifier que le fichier est bien une images

            $materialId = $materiel->getAttributes()['id'];
            $fileName = $materialId . '_' . uniqid() . '_' . $i . '.' . $info["files$i"]->extension();

            $url = $info["files$i"]->storePubliclyAs($this->imagesFolder . 'materials', $fileName);

            $file = [
                'url' => $url,
                'material_id' => $materialId
            ];
            PicturesMaterial::create($file);
        }

        return Redirect::route('material.index')->with('success', 'Materiel ajouté avec succès.');
    }

    public function edit(int $id) {
        $data = Material::find($id)->load('materialType')->load('pictures');

        // Affichage de la vue
        return Inertia::render('Material/Edit',[
            'data' => $data
        ]);
    }
}