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
    public const PARTIES = ['première moitié', 'seconde moitié', 'milieu'];

    public function livres()
    {
        return $this->hasMany(Livre::class);
    }
}
