<?php

namespace App\Http\Controllers;
use App\Models\Livre;
use App\Models\Rayon;
use App\Models\Categorie;
use Illuminate\Http\Request;

class LivreController extends Controller
{
    public function index()
    {
        $livres = Livre::with('categorie', 'rayon')->get();
        return view('livres.index', compact('livres'));
    }

    public function ajouter()
    {
        $categories = Categorie::all();
        $rayons = Rayon::all();
        return view('livres.ajouter', compact('categories','rayons'));
    }
    public function ajouter_traitement(Request $request)
    {

        $request->validate([
            'titre' => 'required',
            'date_de_publication' => 'required|date',
            'nombre_de_page' => 'required',
            'isbn' => 'required|unique:livres,isbn',
            'auteur' => 'required',
            'editeur' => 'required',
            'categorie_id' =>  'required|exists:categories,id',
            'rayon_id' => 'required|exists:rayons,id',
            'disponibilite' => 'required',
        ]);
        livre::create($request->all());
        return redirect()->route('livres.index')->with('success','livre ajouté avec succés');
    }

  
}
