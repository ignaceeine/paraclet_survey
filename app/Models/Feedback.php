<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table = 'feedbacks';

    protected $fillable = [
        'auteur_id',
        'destinataire_id',
    ];

    public function reponses()
    {
        return $this->hasMany(Reponse::class);
    }

    public function auteur()
    {
        return $this->belongsTo(Membre::class);
    }

    public function destinataire()
    {
        return $this->belongsTo(Membre::class);
    }
}
