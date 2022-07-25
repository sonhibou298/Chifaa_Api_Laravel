<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service = Service::all();
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreServiceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreServiceRequest $request)
    {
        $fields = $request->validate([
            'nomService' => 'required|string',
            'tarif_id' => 'required|int'
        ]);
        $service = Service::create([
            'nomService' => $fields['nomService'],
            'tarif_id' => $fields['tarif_id'],
        ]);
        return $service;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service, $id)
    {
        $service = Service::find($id);
        return $service;
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateServiceRequest  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateServiceRequest $request, Service $service, $id)
    {
        $service = Service::find($id);
        $service->update($request->all());
        return response()->json([
            'Message' => 'Service Modifié'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service, $id)
    {
        $service = Service::find($id);
        $service->delete();
        return response()->json([
            'Message' => 'Service Supprimer'
        ]);
    }
}
