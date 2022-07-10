<?php

namespace App\Http\Controllers;

use App\Models\Kateqoriya;
use App\Http\Requests\StoreKateqoriyaRequest;
use App\Http\Requests\UpdateKateqoriyaRequest;

class KateqoriyaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back.pages.kateqoriya.index',[
            'kateqoriyas'=>Kateqoriya::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.pages.kateqoriya.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKateqoriyaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKateqoriyaRequest $request)
    {
        Kateqoriya::create([
            'ad'=>$request->ad
        ]);

        toastr()->success('Əlavə edildi',env('xitab'));

        return redirect()->route('kateqoriya.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kateqoriya  $kateqoriya
     * @return \Illuminate\Http\Response
     */
    public function show(Kateqoriya $kateqoriya)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kateqoriya  $kateqoriya
     * @return \Illuminate\Http\Response
     */
    public function edit(Kateqoriya $kateqoriya)
    {
        return view('back.pages.kateqoriya.edit',[
            'item'=>$kateqoriya
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKateqoriyaRequest  $request
     * @param  \App\Models\Kateqoriya  $kateqoriya
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKateqoriyaRequest $request, Kateqoriya $kateqoriya)
    {
        $kateqoriya->update([
            'ad'=>$request->ad
        ]);

        toastr()->success('Redatə edildi',env('xitab'));

        return redirect()->route('kateqoriya.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kateqoriya  $kateqoriya
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kateqoriya $kateqoriya)
    {
        $kateqoriya->delete();

        toastr()->success('Silindi',env('xitab'));

        return redirect()->route('kateqoriya.index');
    }
}
