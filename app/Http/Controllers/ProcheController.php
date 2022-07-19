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
        //
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
     * @param  \App\Http\Requests\StoreProcheRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProcheRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proche  $proche
     * @return \Illuminate\Http\Response
     */
    public function show(Proche $proche)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proche  $proche
     * @return \Illuminate\Http\Response
     */
    public function edit(Proche $proche)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProcheRequest  $request
     * @param  \App\Models\Proche  $proche
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProcheRequest $request, Proche $proche)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proche  $proche
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proche $proche)
    {
        //
    }
}
