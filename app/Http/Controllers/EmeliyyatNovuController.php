<?php

namespace App\Http\Controllers;

use App\Models\EmeliyyatNovu;
use App\Http\Requests\StoreEmeliyyatNovuRequest;
use App\Http\Requests\UpdateEmeliyyatNovuRequest;

class EmeliyyatNovuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back.pages.operation.index',[
            'operations'=>EmeliyyatNovu::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.pages.operation.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEmeliyyatNovuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmeliyyatNovuRequest $request)
    {
        EmeliyyatNovu::create([
            'ad'=>$request->ad
        ]);

        toastr()->success('Əlavə edildi',env('xitab'));

        return redirect()->route('operation.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EmeliyyatNovu  $emeliyyatNovu
     * @return \Illuminate\Http\Response
     */
    public function show(EmeliyyatNovu $emeliyyatNovu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EmeliyyatNovu  $emeliyyatNovu
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $emeliyyatNovu = EmeliyyatNovu::findOrFail($id);
        return view('back.pages.operation.edit',[
            'item'=>$emeliyyatNovu
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEmeliyyatNovuRequest  $request
     * @param  \App\Models\EmeliyyatNovu  $emeliyyatNovu
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmeliyyatNovuRequest $request, $id)
    {
        $emeliyyatNovu = EmeliyyatNovu::findOrFail($id);
        $emeliyyatNovu->update([
            'ad'=>$request->ad
        ]);

        toastr()->success('Redatə edildi',env('xitab'));

        return redirect()->route('operation.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmeliyyatNovu  $emeliyyatNovu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $emeliyyatNovu = EmeliyyatNovu::findOrFail($id);
        $emeliyyatNovu->delete();

        toastr()->success('Silindi',env('xitab'));

        return redirect()->route('operation.index');
    }
}
