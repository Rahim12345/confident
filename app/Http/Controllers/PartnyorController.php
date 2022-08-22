<?php

namespace App\Http\Controllers;

use App\Models\Partnyor;
use App\Http\Requests\StorePartnyorRequest;
use App\Http\Requests\UpdatePartnyorRequest;
use Illuminate\Support\Facades\DB;

class PartnyorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $partnyors = Partnyor::withSum('mehsuls',"say*maya_deyeri")->latest()->get();
        $partnyors =  DB::select('
        select
            `partnyors`.*,
            (select sum(`maya_deyeri`*`say`+`qutudaki_1_malin_maya_deyeri`+`bir_qutusundaki_say`) from `mehsuls` where `partnyors`.`id` = `mehsuls`.`firma_id`) as `umumiBorc`,
            (select sum(`pul`) from `kassas` where `partnyors`.`id` = `kassas`.`relational_id` and operation_type=2) as `verilenBorc`
        from `partnyors` order by `created_at` desc
        ');
        $partnyors = array($partnyors)[0];
//        dd(array($partnyors));
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
        $partnyor->delete();

        toastr()->success('Silindi',env('xitab'));

        return redirect()->route('partnyor.index');
    }
}
