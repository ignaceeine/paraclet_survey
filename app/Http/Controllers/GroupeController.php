<?php

namespace App\Http\Controllers;

use App\Imports\MembersImport;
use App\Models\Campagne;
use App\Models\Groupe;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class GroupeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $groupes = Groupe::all();
        return view('groupe.index', compact('groupes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $campagne = Campagne::find($id);
        $groupe = new Groupe();
        return view('groupe.create', compact('campagne', 'groupe'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'campagne_id' => 'required',
            'nom_groupe' => 'required',
            'membres' => 'required|file|mimes:xlsx,xls'
        ]);

        $groupe = new Groupe();
        $groupe->campagne_id = $data['campagne_id'];
        $groupe->nom_groupe = $data['nom_groupe'];
        $id_groupe = Groupe::create($groupe->toArray())->id;
        Excel::import(new MembersImport($id_groupe), $data['membres']);

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
    public function destroy(string $id)
    {
        //
    }

//    private function storeMembers($file,$id)
//    {
//        Excel::import(new MembersImport($id), $file);
//        return redirect()->route('admin.index');
//    }
}
