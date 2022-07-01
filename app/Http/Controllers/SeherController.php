<?php

namespace App\Http\Controllers;

use App\Models\Seher;
use App\Http\Requests\StoreSeherRequest;
use App\Http\Requests\UpdateSeherRequest;

class SeherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back.pages.seher.index',[
            'sehers'=>Seher::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.pages.seher.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSeherRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSeherRequest $request)
    {
        Seher::create([
            'ad'=>$request->ad
        ]);

        toastr()->success('Əlavə edildi',env('xitab'));

        return redirect()->route('seher.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Seher  $seher
     * @return \Illuminate\Http\Response
     */
    public function show(Seher $seher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Seher  $seher
     * @return \Illuminate\Http\Response
     */
    public function edit(Seher $seher)
    {
        return view('back.pages.seher.edit',[
            'item'=>$seher
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSeherRequest  $request
     * @param  \App\Models\Seher  $seher
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSeherRequest $request, Seher $seher)
    {
        $seher->update([
            'ad'=>$request->ad
        ]);

        toastr()->success('Redatə edildi',env('xitab'));

        return redirect()->route('seher.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Seher  $seher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seher $seher)
    {
        $seher->delete();

        toastr()->success('Silindi',env('xitab'));

        return redirect()->route('seher.index');
    }
}
