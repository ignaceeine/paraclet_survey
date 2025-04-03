<?php

namespace App\Http\Controllers;

use App\Imports\MembersImport;
use App\Models\Campagne;
use App\Models\Groupe;
use App\Models\Membre;
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
        $groupes = Groupe::all()->where('is_deleted',false);
        return view('groupe.index', compact('groupes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $campagne = Campagne::with('groupe')->findOrFail($id);
        return view('groupe.create', compact('campagne'));
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
        $import = new MembersImport($id_groupe);

        Excel::import($import, $data['membres']);
        $errors = $import->getErrors();

        if (!empty($errors)) {
            return redirect()->back()->withErrors(['import_errors' => $errors]);
        }

        return redirect()->route('admin.campagne')->with('message','Membres ajoutés avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $groupe = Groupe::with('membres')->find($id);
        $membres = $groupe->membres;
        if (request()->ajax()) {
            return response()->json([
                'groupe' => $groupe,
                'membres' => $membres
            ]);
        }
        return view('groupe.index', compact('groupe', 'membres'));
    }

    public function edit(string $id)
    {
        $groupe = Groupe::find($id);
        return view('groupe.edit', compact('groupe'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $data = $request->validate([
            'groupe_id' => 'required',
            'campagne_id' => 'required',
            'membres' => 'required|file|mimes:xlsx,xls'
        ]);

        $groupe = Groupe::find($data['groupe_id']);
        Excel::import(new MembersImport($groupe->id), $data['membres']);
        $groupe->save();

        return redirect()->route('admin.campagne')->with('message','Membres ajoutés avec succès');
    }

    public function updatename(Request $request,$id)
    {
        $data = $request->validate([
            'nom_groupe' =>'required'
        ]);
        $groupe = Groupe::find($id);
        $groupe->nom_groupe = $data['nom_groupe'];
        $groupe->save();

        return redirect()->route('admin.groupe')->with('message','Nom du groupe modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $groupe = Groupe::find($id);
        $membres = $groupe->membres;
        foreach ($membres as $membre) {
            $membre->groupe_id = null;
            $membre->delete();
        }
        $groupe->delete();
        return redirect()->route('admin.groupe')->with('message','Groupe supprimé avec succès');
    }

}
