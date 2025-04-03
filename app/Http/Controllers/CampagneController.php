<?php

namespace App\Http\Controllers;

use App\Models\Campagne;
use Illuminate\Http\Request;

class CampagneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $campagnes = Campagne::all()->where('is_deleted', false);
        return view('campagne.index',compact('campagnes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $campagne = new Campagne();
        return view('campagne.create',compact('campagne'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data =$request->validate([
            'nom_campagne' => 'required',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut',
        ]);
        Campagne::create($data);

        return redirect()->route('admin.campagne')->with('message','La campagne a été crée avec succès');
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
        $campagne = Campagne::find($id);
        return view('campagne.edit',compact('campagne'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'nom_campagne' =>'required',
            'date_debut' =>'required',
            'date_fin' =>'required',
        ]);
        $campagne = Campagne::find($id);
        $campagne->update($data);
        return redirect()->route('admin.campagne')->with('message','La campagne a bien été modifiée');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request['campagne_id'];
        $campagne = Campagne::findOrFail($id);
        $campagne->is_deleted = true;
        $campagne->save();

        return redirect()->route('admin.campagne')->with('message','La campagne a bien été supprimée');
    }
}
