<?php

namespace App\Http\Controllers;

use App\Models\Rendezvous;
use App\Http\Requests\StoreRendezvousRequest;
use App\Http\Requests\UpdateRendezvousRequest;

class RendezvousController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rv = Rendezvous::all();
        return response()->json($rv);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRendezvousRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRendezvousRequest $request)
    {
        $fields = $request->validate([
            'dateReservation' => 'required|date',
            'dateRendezVous' => 'required|date',
            'heureRendezVous' => 'required',
            'motifConsultation' => 'required|string',
            'tarif_id' => 'required|int',
            'medecin_id' => 'required|int',
            'patient_id' => 'required|int',

        ]);
        $rv = Rendezvous::create([
            'dateReservation' => $fields['dateReservation'],
            'dateRendezVous' => $fields['dateRendezVous'],
            'heureRendezVous' => $fields['heureRendezVous'],
            'motifConsultation' => $fields['motifConsultation'],
            'etat' => $request->input('etat'),
            'paye' => $request->input('paye'),
            'tarif_id' => $fields['tarif_id'],
            'medecin_id' => $fields['medecin_id'],
            'patient_id' => $fields['patient_id'],
            'proche_id' => $request->input('proche_id'),

        ]);
        return response()->json($rv);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rendezvous  $rendezvous
     * @return \Illuminate\Http\Response
     */
    public function show(Rendezvous $rendezvous, $id)
    {
        $rv = Rendezvous::find($id);
        return $rv;
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRendezvousRequest  $request
     * @param  \App\Models\Rendezvous  $rendezvous
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRendezvousRequest $request, Rendezvous $rendezvous, $id)
    {
        $rv = Rendezvous::find($id);
        $rv->update($request->all());
        return response()->json([
            'message' => 'Rendez-vous modifié'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rendezvous  $rendezvous
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rendezvous $rendezvous, $id)
    {
        $rv = Rendezvous::find($id);
        $rv->delete();
        return response()->json([
            'message' => 'Rendez-vous modifié'
        ]);
    }
}
