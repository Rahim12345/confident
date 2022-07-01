<?php

namespace App\Http\Controllers;

use App\Models\Hekim;
use App\Http\Requests\StoreHekimRequest;
use App\Http\Requests\UpdateHekimRequest;
use App\Models\Klinika;

class HekimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back.pages.hekim.index',[
            'hekims'=>Hekim::with('klinika')->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $klinikas = Klinika::latest()->get();
        if ($klinikas->count() == 0)
        {
            toastr()->warning('İlk öncə klinika əlavə etməlisiz',env('xitab'));
            return redirect()->route('klinika.create');
        }

        return view('back.pages.hekim.create',compact('klinikas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreHekimRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHekimRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hekim  $hekim
     * @return \Illuminate\Http\Response
     */
    public function show(Hekim $hekim)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hekim  $hekim
     * @return \Illuminate\Http\Response
     */
    public function edit(Hekim $hekim)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateHekimRequest  $request
     * @param  \App\Models\Hekim  $hekim
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHekimRequest $request, Hekim $hekim)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hekim  $hekim
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hekim $hekim)
    {
        //
    }
}
