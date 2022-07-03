<?php

namespace App\Http\Controllers;

use App\Models\Rayon;
use App\Http\Requests\StoreRayonRequest;
use App\Http\Requests\UpdateRayonRequest;
use App\Models\Seher;

class RayonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back.pages.rayon.index',[
            'rayons'=>Rayon::with('seher')->orderBy('ad')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sehers = Seher::latest()->get();
        return view('back.pages.rayon.create',compact('sehers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRayonRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRayonRequest $request)
    {
        Rayon::create([
            'ad'=>$request->ad,
            'seher_id'=>$request->seher_id,
        ]);

        toastr()->success('Əlavə edildi',env('xitab'));

        return redirect()->route('rayon.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rayon  $rayon
     * @return \Illuminate\Http\Response
     */
    public function show(Rayon $rayon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rayon  $rayon
     * @return \Illuminate\Http\Response
     */
    public function edit(Rayon $rayon)
    {
        $sehers = Seher::latest()->get();
        return view('back.pages.rayon.edit',[
            'item'=>$rayon,
            'sehers'=>$sehers
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRayonRequest  $request
     * @param  \App\Models\Rayon  $rayon
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRayonRequest $request, Rayon $rayon)
    {
        $rayon->update([
            'ad'=>$request->ad,
            'seher_id'=>$request->seher_id,
        ]);

        toastr()->success('Redatə edildi',env('xitab'));

        return redirect()->route('rayon.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rayon  $rayon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rayon $rayon)
    {
        $rayon->delete();

        toastr()->success('Silindi',env('xitab'));

        return redirect()->route('rayon.index');
    }
}
