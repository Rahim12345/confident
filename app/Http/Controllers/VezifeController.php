<?php

namespace App\Http\Controllers;

use App\Models\Vezife;
use App\Http\Requests\StoreVezifeRequest;
use App\Http\Requests\UpdateVezifeRequest;

class VezifeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back.pages.vezife.index',[
            'vezifes'=>Vezife::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.pages.vezife.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreVezifeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVezifeRequest $request)
    {
        Vezife::create([
            'ad'=>$request->ad
        ]);

        toastr()->success('Əlavə edildi',env('xitab'));

        return redirect()->route('vezife.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vezife  $vezife
     * @return \Illuminate\Http\Response
     */
    public function show(Vezife $vezife)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vezife  $vezife
     * @return \Illuminate\Http\Response
     */
    public function edit(Vezife $vezife)
    {
        return view('back.pages.vezife.edit',[
            'item'=>$vezife
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVezifeRequest  $request
     * @param  \App\Models\Vezife  $vezife
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVezifeRequest $request, Vezife $vezife)
    {
        $vezife->update([
            'ad'=>$request->ad
        ]);

        toastr()->success('Redatə edildi',env('xitab'));

        return redirect()->route('vezife.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vezife  $vezife
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vezife $vezife)
    {
        $vezife->delete();

        toastr()->success('Silindi',env('xitab'));

        return redirect()->route('vezife.index');
    }
}
