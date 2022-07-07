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
        Partnyor::create([
            'ad'=>$request->ad,
            'tel_1'=>$request->tel_1,
            'tel_2'=>$request->tel_2,
            'tel_3'=>$request->tel_3,
            'fb'=>$request->fb,
            'insta'=>$request->insta,
            'telegram'=>$request->telegram,
            'wp'=>$request->wp,
            'email'=>$request->email,
            'unvan'=>$request->unvan,
        ]);

        toastr()->success('Əlavə edildi',env('xitab'));

        return redirect()->route('partnyor.index');
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
        return view('back.pages.partnyor.edit',compact('partnyor'));
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
        $partnyor->update([
            'ad'=>$request->ad,
            'tel_1'=>$request->tel_1,
            'tel_2'=>$request->tel_2,
            'tel_3'=>$request->tel_3,
            'fb'=>$request->fb,
            'insta'=>$request->insta,
            'telegram'=>$request->telegram,
            'wp'=>$request->wp,
            'email'=>$request->email,
            'unvan'=>$request->unvan,
        ]);

        toastr()->success('Əlavə edildi',env('xitab'));

        return redirect()->route('partnyor.index');
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
