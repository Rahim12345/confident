<?php

namespace App\Http\Controllers;

use App\Models\Partnyor;
use App\Http\Requests\StorePartnyorRequest;
use App\Http\Requests\UpdatePartnyorRequest;

class PartnyorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partnyors = Partnyor::latest()->get();
        return view('back.pages.partnyor.index',compact('partnyors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.pages.partnyor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePartnyorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePartnyorRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Partnyor  $partnyor
     * @return \Illuminate\Http\Response
     */
    public function show(Partnyor $partnyor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Partnyor  $partnyor
     * @return \Illuminate\Http\Response
     */
    public function edit(Partnyor $partnyor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePartnyorRequest  $request
     * @param  \App\Models\Partnyor  $partnyor
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePartnyorRequest $request, Partnyor $partnyor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Partnyor  $partnyor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partnyor $partnyor)
    {
        //
    }
}
