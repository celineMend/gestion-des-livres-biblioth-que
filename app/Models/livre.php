<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class livre extends Model
{
    use HasFactory;
    protected $fillable = [
        'titre', 'date_de_publication', 'nombre_de_page','isbn', 'auteur', 'editeur', 'categorie_id', 'rayon_id', 'disponibilite',
    ];
    protected $dates = ['date_de_publication'];
    
    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function rayon()
    {
        return $this->belongsTo(Rayon::class);
    }
}
