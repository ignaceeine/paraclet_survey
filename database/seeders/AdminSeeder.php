<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            'prenom' => 'Administrateur',
            'nom' => 'Paraclet',
            'username' => 'admin',
            'email' => 'adminps@paraclet.sn',
            'password' => Hash::make('P@sser25#'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
