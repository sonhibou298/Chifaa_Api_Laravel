<?php

namespace App\Http\Controllers;

use App\Models\Medecin;
use App\Http\Requests\StoreMedecinRequest;
use App\Http\Requests\UpdateMedecinRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class MedecinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result =DB::select("SELECT nom, prenom, genre, dateNaissance, status FROM users WHERE role_id = 2");
        return response()->json($result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMedecinRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMedecinRequest $request)
    {
        $fiels = $request->validate([
            'disponible' => 'required|boolean',
            'user_id' => 'required|int',
            'jour_de_service_id' => 'required|int'
        ]);

        $medecin = Medecin::create([

        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Medecin  $medecin
     * @return \Illuminate\Http\Response
     */
    public function show(Medecin $medecin, $id)
    {
        $medecin = Medecin::find($id);
        return $medecin;
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMedecinRequest  $request
     * @param  \App\Models\Medecin  $medecin
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMedecinRequest $request, Medecin $medecin, $id)
    {
        $medecin = Medecin::find($id);
        $medecin->update($request->all());
        return response()->json([
            'Message'=>'Medecein modifié'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Medecin  $medecin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medecin $medecin, $id)
    {
        $medecin = Medecin::find($id);
        $medecin->delete();
        return response()->json([
            'Message'=>'Medecein supprimé'
        ]);
    }
}
