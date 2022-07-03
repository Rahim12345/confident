<?php

namespace App\Http\Controllers;

use App\Models\Klinika;
use App\Http\Requests\StoreKlinikaRequest;
use App\Http\Requests\UpdateKlinikaRequest;
use App\Models\Rayon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class KlinikaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax())
        {
            $data = Klinika::with('rayon')
                ->latest()
                ->get();

            return DataTables::of($data)

                ->addColumn('rayon',function ($row){
                    return $row->rayon ? $row->rayon->ad : '';
                })

                ->addColumn('action',function ($row){
                    return '
                    <div class="btn-list flex-nowrap">
                        <a href="'.route('klinika.edit',$row->id).'" class="btn btn-primary">
                            <i class="fa fa-pen"></i>
                        </a>
                        <div class="">
                            <form action="'.route('klinika.destroy',$row->id).'" method="POST">
                                '.csrf_field().'
                                '.method_field('DELETE').'
                                <button class="btn btn-danger" type="submit" onclick="return confirm(\'Silmek istədiyinizdən əminsiniz?\')"><i class="fa fa-times"></i></button>
                            </form>
                        </div>
                    </div>
                    ';
                })

                ->rawColumns(['rayon','xerite','action'])

                ->make(true);
        }


        return view('back.pages.klinika.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rayons = Rayon::latest()->get();
        if ($rayons->count() == 0)
        {
            toastr()->warning('İlk öncə rayon əlavə etməlisiz',env('xitab'));
            return redirect()->route('rayon.create');
        }

        return view('back.pages.klinika.create',compact('rayons'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKlinikaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKlinikaRequest $request)
    {
        Klinika::create([
            'ad'=>$request->ad,
            'hekim_adi'=>$request->hekim_adi,
            'kuce_adi'=>$request->kuce_adi,
            'xerite'=>$request->xerite,
            'tel_1'=>$request->tel_1,
            'tel_2'=>$request->tel_2,
            'tel_3'=>$request->tel_3,
            'fb'=>$request->fb,
            'insta'=>$request->insta,
            'telegram'=>$request->telegram,
            'wp'=>$request->wp,
            'email'=>$request->email,
            'rayon_id'=>$request->rayon_id,
        ]);

        toastr()->success('Əlavə edildi',env('xitab'));

        return redirect()->route('klinika.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Klinika  $klinika
     * @return \Illuminate\Http\Response
     */
    public function show(Klinika $klinika)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Klinika  $klinika
     * @return \Illuminate\Http\Response
     */
    public function edit(Klinika $klinika)
    {
        $rayons = Rayon::latest()->get();
        if ($rayons->count() == 0)
        {
            toastr()->warning('İlk öncə rayon əlavə etməlisiz',env('xitab'));
            return redirect()->route('rayon.create');
        }

        return view('back.pages.klinika.edit',compact('rayons','klinika'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKlinikaRequest  $request
     * @param  \App\Models\Klinika  $klinika
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKlinikaRequest $request, Klinika $klinika)
    {
        $klinika->update([
            'ad'=>$request->ad,
            'hekim_adi'=>$request->hekim_adi,
            'kuce_adi'=>$request->kuce_adi,
            'xerite'=>$request->xerite,
            'tel_1'=>$request->tel_1,
            'tel_2'=>$request->tel_2,
            'tel_3'=>$request->tel_3,
            'fb'=>$request->fb,
            'insta'=>$request->insta,
            'telegram'=>$request->telegram,
            'wp'=>$request->wp,
            'email'=>$request->email,
            'rayon_id'=>$request->rayon_id,
        ]);

        toastr()->success('Redatə edildi',env('xitab'));

        return redirect()->route('klinika.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Klinika  $klinika
     * @return \Illuminate\Http\Response
     */
    public function destroy(Klinika $klinika)
    {
        $klinika->delete();

        toastr()->success('Silindi',env('xitab'));

        return redirect()->route('klinika.index');
    }
}
