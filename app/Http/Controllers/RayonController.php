<?php

namespace App\Http\Controllers;
use App\Models\Rayon;
use Illuminate\Http\Request;

class RayonController extends Controller
{
    public function index()
    {
        $rayons = Rayon::all();
        return view('rayons.index', ['rayons' => $rayons]);
    }
    public function remplir()
    {
        return view('rayons.remplir');
    }

    public function traitement_remplissage(Request $request)
    {
        $request->validate([
            'libelle' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image_url' => 'nullable|url',
        ]);

        Rayon::create($request->all());

        return redirect()->route('rayons.index')->with('success', 'Rayon ajouté avec succès.');
    }


    public function modifier($id)
    {
        $rayon = Rayon::findOrFail($id);
        return view('rayons.modifier', compact('rayon'));
    }

    public function traitement_modification(Request $request, $id)
    {
        $request->validate([
            'libelle' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image_url' => 'nullable|url',
        ]);

        $rayon = Rayon::findOrFail($id);
        $rayon->update($request->all());

        return redirect()->route('rayons.index')->with('success', 'Rayon mis à jour avec succès.');
    }

    public function supprimer($id)
    {
        $rayon = Rayon::findOrFail($id);
        $rayon->delete();

        return redirect()->route('rayons.index')->with('success', 'Rayon supprimé avec succès.');
    }


}
