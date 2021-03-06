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
        return view('back.pages.model.index',[
            'markas'=>Marka::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.pages.model.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMarkaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMarkaRequest $request)
    {
        Marka::create([
            'ad'=>$request->ad
        ]);

        toastr()->success('Əlavə edildi',env('xitab'));

        return redirect()->route('model.index');
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
    public function edit($id)
    {
        $marka = Marka::findOrFail($id);
        return view('back.pages.model.edit',[
            'item'=>$marka
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMarkaRequest  $request
     * @param  \App\Models\Marka  $marka
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMarkaRequest $request, $id)
    {
        $marka = Marka::findOrFail($id);
        $marka->update([
            'ad'=>$request->ad
        ]);

        toastr()->success('Redatə edildi',env('xitab'));

        return redirect()->route('model.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Marka  $marka
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $marka = Marka::findOrFail($id);
        $marka->delete();

        toastr()->success('Silindi',env('xitab'));

        return redirect()->route('model.index');
    }
}
