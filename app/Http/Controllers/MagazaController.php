<?php

namespace App\Http\Controllers;

use App\Models\Magaza;
use App\Http\Requests\StoreMagazaRequest;
use App\Http\Requests\UpdateMagazaRequest;

class MagazaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back.pages.magaza.index',[
            'magazas'=>Magaza::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.pages.magaza.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMagazaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMagazaRequest $request)
    {
        Magaza::create([
            'ad'=>$request->ad
        ]);

        toastr()->success('Əlavə edildi',env('xitab'));

        return redirect()->route('magaza.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Magaza  $magaza
     * @return \Illuminate\Http\Response
     */
    public function show(Magaza $magaza)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Magaza  $magaza
     * @return \Illuminate\Http\Response
     */
    public function edit(Magaza $magaza)
    {
        return view('back.pages.magaza.edit',[
            'item'=>$magaza
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMagazaRequest  $request
     * @param  \App\Models\Magaza  $magaza
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMagazaRequest $request, Magaza $magaza)
    {
        $magaza->update([
           'ad'=>$request->ad
        ]);

        toastr()->success('Redatə edildi',env('xitab'));

        return redirect()->route('magaza.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Magaza  $magaza
     * @return \Illuminate\Http\Response
     */
    public function destroy(Magaza $magaza)
    {
        $magaza->delete();

        toastr()->success('Silindi',env('xitab'));

        return redirect()->route('magaza.index');
    }
}
