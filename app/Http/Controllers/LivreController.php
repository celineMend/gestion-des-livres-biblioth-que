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
        $livres = Livre::all();
        $categories = Categorie::all();
        $rayons = Rayon::all();

        return view('/livres.index', compact('livres', 'categories', 'rayons'));

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
    public function modifier($id)
    {
        $livre = Livre::findOrFail($id);
        $categories = Categorie::all();
        $rayons = Rayon::all();
        return view('livres.modifier', compact('livre', 'categories', 'rayons'));
    }

    // Méthode pour traiter la modification
    public function sauvegarder(Request $request,$id)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'date_de_publication' => 'required|date',
            'nombre_de_page' => 'required|integer',
            'isbn' => 'required|string|max:20|unique:livres,isbn,' . $id,
            'auteur' => 'required|string|max:255',
            'editeur' => 'required|string|max:255',
            'categorie_id' => 'required|exists:categories,id',
            'rayon_id' => 'required|exists:rayons,id',
            'disponibilite' => 'required|boolean',
        ]);

        $livre = Livre::findOrFail($id);
        $livre->titre = $request->input('titre');
        $livre->date_de_publication = $request->input('date_de_publication');
        $livre->nombre_de_page = $request->input('nombre_de_page');
        $livre->isbn = $request->input('isbn');
        $livre->auteur = $request->input('auteur');
        $livre->editeur = $request->input('editeur');
        $livre->categorie_id = $request->input('categorie_id');
        $livre->rayon_id = $request->input('rayon_id');
        $livre->disponibilite = $request->input('disponibilite');
        $livre->save();

        return redirect()->route('livres.index')->with('status', 'Livre modifié avec succès!');
    }
    public function supprimer($id)
    {
        $livre = livre::findOrFail($id);
        $livre->delete();
        return redirect()->route('livres.index')->with('status','Livre supprimé avec succès');
    }
    public function afficher($id)
    {
        $livre = Livre::findOrFail($id);
        return view('livres.detail',compact('livre'));
    }

}
