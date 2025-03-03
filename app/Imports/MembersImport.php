<?php

namespace App\Imports;

use App\Http\Controllers\MembreController;
use App\Models\Membre;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class MembersImport implements ToModel
{
    private $groupeId;

    // Ajoutez un constructeur pour accepter l'ID du groupe
    public function __construct($groupeId)
    {
        $this->groupeId = $groupeId;
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Membre([
            'nom' => $row[0],
            'prenom' => $row[1],
            'email' => $row[2],
            'groupe_id' => $this->groupeId,
            'username' => MembreController::generateUsername(),
            'password' => Hash::make('passer123')
        ]);
    }
}
