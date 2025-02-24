<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class MembersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'nom' => $row[0],
            'prenom' => $row[1],
            'email' => $row[2],
            'username' => 'username1',
            'password' => Hash::make('passer123')
        ]);
    }
}
