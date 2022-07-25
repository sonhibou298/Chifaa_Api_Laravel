<?php

namespace App\Http\Controllers;

use App\Models\Tarif;
use App\Http\Requests\StoreTarifRequest;
use App\Http\Requests\UpdateTarifRequest;

class TarifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tarif = Tarif::all();
        return response()->json($tarif);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTarifRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTarifRequest $request)
    {
        $fields = $request->validate([
            'coutConsultation' => 'required|int'
        ]);
        $tarif = Tarif::create([
            'coutConsultation' => $fields['coutConsultation']
        ]);
        return response()->json([
            'Success' => 'Tarif inséré avec Succès'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tarif  $tarif
     * @return \Illuminate\Http\Response
     */
    public function show(Tarif $tarif, $id)
    {
        $tarif = Tarif::find($id);
        return response()->json($tarif);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTarifRequest  $request
     * @param  \App\Models\Tarif  $tarif
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTarifRequest $request, Tarif $tarif, $id)
    {
        $tarif = Tarif::find($id);
        $tarif->update($request->all());
        return response()->json([
            'Success' => 'Tarif modifié avec Succès'
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tarif  $tarif
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tarif $tarif, $id)
    {
        $tarif = Tarif::find($id);
        $tarif->delete();
        return response()->json([
            'Success' => 'Tarif inséré avec Succès'
        ]);
    }
}
