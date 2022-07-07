<?php

namespace App\Http\Controllers;

use App\Models\Hekim;
use App\Http\Requests\StoreHekimRequest;
use App\Http\Requests\UpdateHekimRequest;
use App\Models\HekimVezife;
use App\Models\Klinika;
use App\Models\Magaza;
use App\Models\User;
use App\Models\Vezife;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class HekimController extends Controller
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
            $data = User::where('id','!=',1)->with('klinika')
                ->latest()
                ->get();

            return DataTables::of($data)

                ->addColumn('seher',function ($row){
                    $seher = '';
                    if ($row->klinika)
                    {
                        $seher = '';
                        if ($row->klinika->rayon)
                        {
                            $seher = '';
                            if ($row->klinika->rayon->seher)
                            {
                                $seher = $row->klinika->rayon->seher->ad;
                            }
                        }
                    }
                    return $seher;
                })

                ->addColumn('rayon',function ($row){
                    $rayon = '';
                    if ($row->klinika)
                    {
                        $rayon = '';
                        if ($row->klinika->rayon)
                        {
                            $rayon = $row->klinika->rayon->ad;
                        }
                    }
                    return $rayon;
                })

                ->addColumn('klinika',function ($row){
                    $klinika = '';
                    if ($row->klinika)
                    {
                        $klinika = '';
                        if ($row->klinika->ad)
                        {
                            $klinika = $row->klinika->ad;
                        }
                        else
                        {
                            $klinika = $row->klinika->hekim_adi;
                        }
                    }
                    return $klinika;
                })

                ->addColumn('action',function ($row){
                    return '
                    <div class="btn-list flex-nowrap">
                        <a href="'.route('hekim.edit',$row->id).'" class="btn btn-primary">
                            <i class="fa fa-pen"></i>
                        </a>
                        <div class="">
                            <form action="'.route('hekim.destroy',$row->id).'" method="POST">
                                '.csrf_field().'
                                '.method_field('DELETE').'
                                <button class="btn btn-danger" type="submit" onclick="return confirm(\'Silmek istədiyinizdən əminsiniz?\')"><i class="fa fa-times"></i></button>
                            </form>
                        </div>
                    </div>
                    ';
                })

                ->rawColumns(['seher','rayon','klinika','action'])

                ->make(true);
        }
        return view('back.pages.hekim.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $klinikas   = Klinika::latest()->get();
        $vezifes    = Vezife::latest()->get();
        $hvezifes    = HekimVezife::latest()->get();
        $magazas    = Magaza::latest()->get();
        if ($klinikas->count() == 0)
        {
            toastr()->warning('İlk öncə klinika əlavə etməlisiz',env('xitab'));
            return redirect()->route('klinika.create');
        }

        if ($vezifes->count() == 0)
        {
            toastr()->warning('İlk öncə vəzifə əlavə etməlisiz',env('xitab'));
            return redirect()->route('vezife.create');
        }

        if ($hvezifes->count() == 0)
        {
            toastr()->warning('İlk öncə hıkim vəzifələri əlavə etməlisiz',env('xitab'));
            return redirect()->route('hvezife.create');
        }

        if ($magazas->count() == 0)
        {
            toastr()->warning('İlk öncə mağaza əlavə etməlisiz',env('xitab'));
            return redirect()->route('magaza.create');
        }

        return view('back.pages.hekim.create',compact('klinikas','hvezifes','vezifes','magazas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreHekimRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHekimRequest $request)
    {
        User::create([
            'name'=>$request->ad,
            'klinika_id'=>$request->klinika_id,
            'hekim_vezife_id'=>$request->hvezife_id,
            'vezife_id'=>$request->has('status') ? $request->vezife_id : null,
            'magaza_id'=>$request->has('status') ? $request->magaza_id : null,
            'dogum_gunu'=>$request->dogum_gunu,
            'tel_1'=>$request->tel_1,
            'tel_2'=>$request->tel_2,
            'tel_3'=>$request->tel_3,
            'fb'=>$request->fb,
            'insta'=>$request->insta,
            'telegram'=>$request->telegram,
            'wp'=>$request->wp,
            'email'=>$request->has('status') ? $request->email : null,
            'password'=>$request->has('status') ? bcrypt($request->password) : null,
            'status'=>$request->has('status') ? 1 : 0
        ]);

        toastr()->success('Əlavə edildi',env('xitab'));

        return redirect()->route('hekim.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hekim  $hekim
     * @return \Illuminate\Http\Response
     */
    public function show(Hekim $hekim)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hekim  $hekim
     * @return \Illuminate\Http\Response
     */
    public function edit(User $hekim)
    {
        $klinikas   = Klinika::latest()->get();
        $vezifes    = Vezife::latest()->get();
        $hvezifes    = HekimVezife::latest()->get();
        $magazas    = Magaza::latest()->get();
        if ($klinikas->count() == 0)
        {
            toastr()->warning('İlk öncə klinika əlavə etməlisiz',env('xitab'));
            return redirect()->route('klinika.create');
        }

        if ($vezifes->count() == 0)
        {
            toastr()->warning('İlk öncə vəzifə əlavə etməlisiz',env('xitab'));
            return redirect()->route('vezife.create');
        }

        if ($hvezifes->count() == 0)
        {
            toastr()->warning('İlk öncə hıkim vəzifələri əlavə etməlisiz',env('xitab'));
            return redirect()->route('hvezife.create');
        }

        if ($magazas->count() == 0)
        {
            toastr()->warning('İlk öncə mağaza əlavə etməlisiz',env('xitab'));
            return redirect()->route('magaza.create');
        }

        return view('back.pages.hekim.edit',compact('klinikas','vezifes','hvezifes','hekim','magazas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateHekimRequest  $request
     * @param  \App\Models\Hekim  $hekim
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHekimRequest $request, User $hekim)
    {
        $hekim->update([
            'name'=>$request->ad,
            'klinika_id'=>$request->klinika_id,
            'hekim_vezife_id'=>$request->hvezife_id,
            'vezife_id'=>$request->has('status') ? $request->vezife_id : null,
            'magaza_id'=>$request->has('status') ? $request->magaza_id : null,
            'dogum_gunu'=>$request->dogum_gunu,
            'tel_1'=>$request->tel_1,
            'tel_2'=>$request->tel_2,
            'tel_3'=>$request->tel_3,
            'fb'=>$request->fb,
            'insta'=>$request->insta,
            'telegram'=>$request->telegram,
            'wp'=>$request->wp,
            'email'=>$request->has('status') ? $request->email : null,
            'password'=>$request->has('status') ? bcrypt($request->password) : null,
            'status'=>$request->has('status') ? 1 : 0
        ]);

        toastr()->success('Redatə edildi',env('xitab'));

        return redirect()->route('hekim.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hekim  $hekim
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $hekim)
    {
        $hekim->delete();
        toastr()->success('Silindi',env('xitab'));

        return redirect()->route('hekim.index');
    }
}
