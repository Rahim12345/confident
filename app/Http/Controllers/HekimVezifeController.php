<?php

namespace App\Http\Controllers;

use App\Models\HekimVezife;
use App\Http\Requests\StoreHekimVezifeRequest;
use App\Http\Requests\UpdateHekimVezifeRequest;

class HekimVezifeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back.pages.hvezife.index',[
            'vezifes'=>HekimVezife::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.pages.hvezife.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreHekimVezifeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHekimVezifeRequest $request)
    {
        HekimVezife::create([
            'ad'=>$request->ad
        ]);

        toastr()->success('Əlavə edildi',env('xitab'));

        return redirect()->route('hvezife.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HekimVezife  $hekimVezife
     * @return \Illuminate\Http\Response
     */
    public function show(HekimVezife $hekimVezife)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HekimVezife  $hekimVezife
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hekimVezife = HekimVezife::findOrFail($id);
        return view('back.pages.hvezife.edit',[
            'item'=>$hekimVezife
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateHekimVezifeRequest  $request
     * @param  \App\Models\HekimVezife  $hekimVezife
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHekimVezifeRequest $request, $id)
    {
        $hekimVezife = HekimVezife::findOrFail($id);
        $hekimVezife->update([
            'ad'=>$request->ad
        ]);

        toastr()->success('Redatə edildi',env('xitab'));

        return redirect()->route('hvezife.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HekimVezife  $hekimVezife
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hekimVezife = HekimVezife::findOrFail($id);
        $hekimVezife->delete();

        toastr()->success('Silindi',env('xitab'));

        return redirect()->route('hvezife.index');
    }
}
