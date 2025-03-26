<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{
    protected $fillable = [
        'campagne_id',
        'nom_groupe'
    ];

    public function campagne()
    {
        return $this->belongsTo(Campagne::class);
    }

    public function users()
    {
        return $this->hasMany(Membre::class);
    }

    public function membres()
    {
        return $this->hasMany(Membre::class);
    }

}
