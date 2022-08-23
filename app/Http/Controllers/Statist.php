<?php

namespace App\Http\Controllers;

use App\Models\User;
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

        $buay =  DB::select('
        select
        sum(pul) as total,
        giris_ve_ya_cixis
        from kassas as k
        left join operations as o on o.id=k.operation_id  where
        MONTH(k.updated_at) = MONTH(CURRENT_DATE())
AND YEAR(k.updated_at) = YEAR(CURRENT_DATE())
        group by giris_ve_ya_cixis
        ');

        $totalAy = 0;
        if (count($buay) == 0)
        {
            $totalAy = 0;
        }
        elseif (count($buay) == 1)
        {
            $totalAy = $buay[0]->total;
        }
        elseif (count($buay) == 2)
        {
            $totalAy = $buay[0]->total - $buay[1]->total;
        }


        $bugun =  DB::select('
        select
        sum(pul) as total,
        giris_ve_ya_cixis
        from kassas as k
        left join operations as o on o.id=k.operation_id  where  date(k.updated_at) = date(CURRENT_DATE)
        group by giris_ve_ya_cixis
        ');

        $bugunkiMusteriAdgunuleri =  DB::select('
        select
        *
        from users
        where MONTH(dogum_gunu) = '.date('m').' and
        DAY(dogum_gunu) = '.date('d').' and
        status = 0
        ');

        $bugunkiPersonalAdgunuleri =  DB::select('
        select
        *
        from users
        where MONTH(dogum_gunu) = '.date('m').' and
        DAY(dogum_gunu) = '.date('d').' and
        status = 1
        ');

        $son_musteriler = DB::select("
        SELECT * FROM
          (SELECT id as client_id,name AS client_name,REPLACE(REPLACE(status, 0, 'hekim'), 1, 'hekim') as client_status,updated_at FROM users WHERE id > 1 UNION SELECT id as client_id,ad  AS client_name,'partnyor',updated_at FROM partnyors UNION SELECT id as client_id,ad  AS client_name,'klinika',updated_at FROM klinikas)
          AS umumi ORDER BY updated_at DESC LIMIT 20;
        ");

//        dd($son_musteriler);



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

        $isciler = DB::select("
        SELECT
            *,
            (SELECT SUM(`PUL`) FROM kassas WHERE users.id = kassas.relational_id AND kassas.operation_type=1) as apul
            FROM `users`
            WHERE `status`=1
            ORDER BY apul DESC;
        ");

//        dd($isciler);

        $iscininQazandirdigiPullar = DB::select("
        SELECT
            *,
            (SELECT SUM(`qutu_sayi`*`qutusunun_faktiki_satildigi_qiymet`+`satis_miqdari_ededle`*`bir_ededinin_faktiki_satildigi_qiymeti`) FROM satis_detallaris WHERE satis.id = satis_detallaris.satis_id) as ilkin_odenis_cemi,
            FROM `users`
            WHERE `status`=1
            ORDER BY apul DESC;
        ");

//        dd($iscininQazandirdigiPullar);


        return view('back.pages.dashboard',compact('totalUmumi','totalAy','totalBugun','bugunkiMusteriAdgunuleri','bugunkiPersonalAdgunuleri','son_musteriler','isciler'));
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
