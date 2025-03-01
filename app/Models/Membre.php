<?php
namespace App\Models;

class Membre extends User
{
    protected $table = 'users';

    protected $attributes = [
        'role' => 'membre'
    ];

    public function groupe()
    {
        return $this->belongsTo(Groupe::class);
    }
}
