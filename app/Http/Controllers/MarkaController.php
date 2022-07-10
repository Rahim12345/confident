<?php

namespace App\Http\Controllers;

use App\Models\Marka;
use App\Http\Requests\StoreMarkaRequest;
use App\Http\Requests\UpdateMarkaRequest;

class MarkaController extends Controller
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
     * @param  \App\Http\Requests\StoreMarkaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMarkaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Marka  $marka
     * @return \Illuminate\Http\Response
     */
    public function show(Marka $marka)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Marka  $marka
     * @return \Illuminate\Http\Response
     */
    public function edit(Marka $marka)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMarkaRequest  $request
     * @param  \App\Models\Marka  $marka
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMarkaRequest $request, Marka $marka)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Marka  $marka
     * @return \Illuminate\Http\Response
     */
    public function destroy(Marka $marka)
    {
        //
    }
}
