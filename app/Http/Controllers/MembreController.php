<?php

namespace App\Http\Controllers;

use App\Imports\MembersImport;
use App\Jobs\SendMemberWelcomeEmail;
use App\Mail\MemberWelcome;
use App\Models\Campagne;
use App\Models\Groupe;
use App\Models\Membre;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class MembreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('membre.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyMembre($id)
    {
        $membre = Membre::find($id);
        $membre->delete();
        return redirect()->route('admin.groupe')->with('message','Membre supprimé avec succès');
    }

    public function storeMembre(Request $request)
    {
        $data = $request->validate([
            'groupe_id' => 'required',
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email|unique:users'
        ]);

        $pwd = Str::random(8);

        $membre = new Membre();
        $membre->nom = $data['nom'];
        $membre->prenom = $data['prenom'];
        $membre->email = $data['email'];
        $membre->groupe_id = $data['groupe_id'];
        $membre->username = $this->generateUsername();
        $membre->password = Hash::make($pwd);
        $membre->save();

        Queue::push(new SendMemberWelcomeEmail($membre,$pwd));

        return redirect()->route('admin.groupe')->with('message','Membre ajouté avec succès');
    }

    public function createMembre($id)
    {
        $groupe = Groupe::find($id);
        return view('groupe.createMember', compact('groupe'));
    }

    public static function generateUsername(): string
    {
        $prefix = 'user-ps'; // Préfixe personnalisable
        $lastUser = Membre::orderBy('id', 'desc')->first();

        // Si aucun utilisateur n'existe, commencer à user001
        if (!$lastUser) {
            return $prefix . '000001';
        }

        // Extraire le numéro du dernier username et l'incrémenter
        $lastNumber = (int) substr($lastUser->username, strlen($prefix));
        $newNumber = str_pad($lastNumber + 1, 6, '0', STR_PAD_LEFT);

        return $prefix . $newNumber;
    }
}
