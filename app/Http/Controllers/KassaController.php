<?php

namespace App\Http\Controllers;

use App\Models\Kassa;
use App\Http\Requests\StoreKassaRequest;
use App\Http\Requests\UpdateKassaRequest;

class KassaController extends Controller
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
     * @param  \App\Http\Requests\StoreKassaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKassaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kassa  $kassa
     * @return \Illuminate\Http\Response
     */
    public function show(Kassa $kassa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kassa  $kassa
     * @return \Illuminate\Http\Response
     */
    public function edit(Kassa $kassa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKassaRequest  $request
     * @param  \App\Models\Kassa  $kassa
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKassaRequest $request, Kassa $kassa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kassa  $kassa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kassa $kassa)
    {
        //
    }
}
