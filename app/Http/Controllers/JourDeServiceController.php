<?php

namespace App\Http\Controllers;

use App\Models\JourDeService;
use App\Http\Requests\StoreJourDeServiceRequest;
use App\Http\Requests\UpdateJourDeServiceRequest;

class JourDeServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jourService = JourDeService::all();
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreJourDeServiceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJourDeServiceRequest $request)
    {
        $jourService = JourDeService::create($request->all());

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JourDeService  $jourDeService
     * @return \Illuminate\Http\Response
     */
    public function show(JourDeService $jourDeService, $id)
    {
        $jourDeService = JourDeService::find($id);
        return $jourDeService;
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateJourDeServiceRequest  $request
     * @param  \App\Models\JourDeService  $jourDeService
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJourDeServiceRequest $request, JourDeService $jourDeService, $id)
    {
        $jourDeService = JourDeService::find($id);
        $jourDeService->update($request->all());
        return response()->json([
            'Message' => 'Jour de service modifié'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JourDeService  $jourDeService
     * @return \Illuminate\Http\Response
     */
    public function destroy(JourDeService $jourDeService, $id)
    {
        $jourDeService = JourDeService::find($id);
        $jourDeService->delete();
        return response()->json([
            'Message' => 'Jour de service supprimé'
        ]);
    }
}
