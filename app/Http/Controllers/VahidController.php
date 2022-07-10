<?php

namespace App\Http\Controllers;

use App\Models\Vahid;
use App\Http\Requests\StoreVahidRequest;
use App\Http\Requests\UpdateVahidRequest;

class VahidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back.pages.vahid.index',[
            'vahids'=>Vahid::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.pages.vahid.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreVahidRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVahidRequest $request)
    {
        Vahid::create([
            'ad'=>$request->ad
        ]);

        toastr()->success('Əlavə edildi',env('xitab'));

        return redirect()->route('vahid.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vahid  $vahid
     * @return \Illuminate\Http\Response
     */
    public function show(Vahid $vahid)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vahid  $vahid
     * @return \Illuminate\Http\Response
     */
    public function edit(Vahid $vahid)
    {
        return view('back.pages.vahid.edit',[
            'item'=>$vahid
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVahidRequest  $request
     * @param  \App\Models\Vahid  $vahid
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVahidRequest $request, Vahid $vahid)
    {
        $vahid->update([
            'ad'=>$request->ad
        ]);

        toastr()->success('Redatə edildi',env('xitab'));

        return redirect()->route('vahid.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vahid  $vahid
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vahid $vahid)
    {
        $vahid->delete();

        toastr()->success('Silindi',env('xitab'));

        return redirect()->route('vahid.index');
    }
}
