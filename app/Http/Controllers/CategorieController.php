<?php

namespace App\Http\Controllers;
use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Http\Controllers\CategorieController;

class CategorieController extends Controller
{
    public function index()
    {
        $categories = Categorie::all();
        return view('categories.index',['categories' => $categories]);
    }

    public function partager()
    {
        {
            return view('categories.partager');
        }
    }
        public function sauvegarder(Request $request)
        {
            $request->validate([
                'libelle' => 'required|string|max:255',
                'description' => 'nullable|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            ]);

            Categorie::create($request->all());

            return redirect()->route('categories.index')->with('success', 'Catégorie ajoutée avec succès.');
        }



        public function modifier($id)
        {
            $categorie = Categorie::findOrFail($id);
            return view('categories.modifier', compact('categorie'));
        }

        public function sauvegarde_modification(Request $request, $id)
        {
            $request->validate([
                'libelle' => 'required|string|max:255',
                'description' => 'nullable|string',
            ]);

            $categorie = Categorie::findOrFail($id);
            $categorie->update($request->all());

            return redirect()->route('categories.index')->with('success', 'Catégorie mise à jour avec succès.');
        }

        public function supprimer($id)
        {
            $categorie = Categorie::findOrFail($id);
            $categorie->delete();

            return redirect()->route('categories.index')->with('success', 'Catégorie supprimée avec succès.');
        }
}
