<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class rayon extends Model
{
    use HasFactory;
    protected $fillable = [
        'libelle',
        'partie',
    ];

    public function livres()
    {
        return $this->hasMany(Livre::class);
    }
}
