<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivreController;
use App\Http\Controllers\CategorieController;

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
<<<<<<< HEAD
//Route pour afficher les détail d'un livre
Route::get('/livres/{id}', [LivreController::class, 'afficher'])->name('livres.detail');
=======
//Route pour les catégories
Route::get('/categories', [CategorieController::class, 'index'])->name('categories.index');
//route pour ajouter des catégories
Route::get('/categories/partager', [CategorieController::class, 'partager'])->name('categories.partager');
//route pour le traitement du formulaire d'ajout
Route::post('/categories/sauvegarder', [CategorieController::class, 'sauvegarder'])->name('categories.sauvegarder');
//route poour modifier des categories
Route::get('/categories/{id}/modifier', [CategorieController::class, 'modifier'])->name('categories.modifier');
Route::post('/categories/{id}', [CategorieController::class, 'sauvegarde_modification'])->name('categories.sauvegarde_modification');
//Route pour la suppression des catégories
Route::delete('/supprimer/{id}', [CategorieController::class, 'supprimer'])->name('categories.supprimer');
>>>>>>> feature/crud_categorie
