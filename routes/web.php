<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivreController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/livres', [LivreController::class, 'index'])->name('livres.index');
Route::get('/livres/ajouter',[LivreController::class,'ajouter'])->name('livres.ajouter');
Route::post('/livres/ajouter_traitement',[LivreController::class,'ajouter_traitement'])->name('livres.ajouter_traitement');
// Route pour afficher le formulaire de modification
Route::get('/livres/{id}modifier', [LivreController::class, 'modifier'])->name('livres.modifier');
// Route pour traiter la modification
Route::post('/livres/{id}sauvegarder', [LivreController::class, 'sauvegarder'])->name('livres.sauvegarder');
//Route pour supprimer
Route::delete('/supprimer/{id}', [LivreController::class, 'supprimer'])->name('livres.supprimer');
//Route pour afficher les détail d'un livre
Route::get('/livres/{id}', [LivreController::class, 'afficher'])->name('livres.detail');
