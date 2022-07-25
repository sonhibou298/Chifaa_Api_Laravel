<?php

namespace App\Http\Controllers;

use App\Models\Proche;
use App\Http\Requests\StoreProcheRequest;
use App\Http\Requests\UpdateProcheRequest;

class ProcheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proche = Proche::all();
        return response()->json($proche);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProcheRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProcheRequest $request)
    {
        $proche = Proche::create($request->all());
        return response()->json($proche);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proche  $proche
     * @return \Illuminate\Http\Response
     */
    public function show(Proche $proche, $id)
    {
        $proche = Proche::find($id);
        return response()->json($proche);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProcheRequest  $request
     * @param  \App\Models\Proche  $proche
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProcheRequest $request, Proche $proche, $id)
    {
        $proche = Proche::find($id);
        $proche->update($request->all());
        return response()->json([
            'message' => 'Proche modifié'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proche  $proche
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proche $proche, $id)
    {
        $proche = Proche::find($id);
        $proche->delete();
        return response()->json([
            'message' => 'Proche supprimé'
        ]);
    }
}
