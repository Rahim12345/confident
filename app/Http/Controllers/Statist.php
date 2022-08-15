<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Statist extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $umumi =  DB::select('
        select
        sum(pul) as total,
        giris_ve_ya_cixis
        from kassas as k
        left join operations as o on o.id=k.operation_id group by giris_ve_ya_cixis
        ');

        $totalUmumi = 0;
        if (count($umumi) == 0)
        {
            $totalUmumi = 0;
        }
        elseif (count($umumi) == 1)
        {
            $totalUmumi = $umumi[0]->total;
        }
        elseif (count($umumi) == 2)
        {
            $totalUmumi = $umumi[0]->total - $umumi[1]->total;
        }

        $bugun =  DB::select('
        select
        sum(pul) as total,
        giris_ve_ya_cixis
        from kassas as k
        left join operations as o on o.id=k.operation_id  where  date(k.updated_at) = date(CURRENT_DATE)
        group by giris_ve_ya_cixis
        ');

        $totalBugun = 0;
        if (count($bugun) == 0)
        {
            $totalBugun = 0;
        }
        elseif (count($bugun) == 1)
        {
            $totalBugun = $bugun[0]->total;
        }
        elseif (count($bugun) == 2)
        {
            $totalBugun = $bugun[0]->total - $bugun[1]->total;
        }

        dd($totalBugun);
        return view('back.pages.dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
