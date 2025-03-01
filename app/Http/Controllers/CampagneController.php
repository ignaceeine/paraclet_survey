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
        $campagnes = Campagne::all();
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
            'date_debut' => 'required',
            'date_fin' => 'required',
        ]);
        Campagne::create($data);

        return redirect()->route('admin.campagne');
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
}
