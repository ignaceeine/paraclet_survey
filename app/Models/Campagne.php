<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campagne extends Model
{
    protected $fillable = [
        'nom_campagne',
        'date_debut',
        'date_fin',
    ];

    public function groupe()
    {
        return $this->hasOne(Groupe::class);
    }

}
