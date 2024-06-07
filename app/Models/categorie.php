<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class categorie extends Model
{
    use HasFactory;

    protected $fillable = [
        'libelle',
        'description'
    ];

    public function livres()
    {
        return $this->hasMany(Livre::class);
    }
}
