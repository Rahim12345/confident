<?php

namespace App\Http\Controllers;

use App\Models\Istehsalci;
use App\Models\Kateqoriya;
use App\Models\Marka;
use App\Models\Mehsul;
use App\Http\Requests\StoreMehsulRequest;
use App\Http\Requests\UpdateMehsulRequest;
use App\Models\Partnyor;
use App\Models\Vahid;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class MehsulController extends Controller
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
            $data = Mehsul::query()->with(['firma','istehsalci','kateqoriya','marka','vahid','satis_details']);

            return DataTables::of($data)

                ->editColumn('say',function ($row){
                    $qalan_say = 0;
                    if ($row->vahid_id == 1)
                    {
                        $satilan_qutu_say = $row->satis_details()->sum('qutu_sayi');

                        $satilan_ededle_say = $row->satis_details()->sum('satis_miqdari_ededle');

                        $qalan__ededle_say = $row->say * $row->bir_qutusundaki_say - ($satilan_qutu_say * $row->bir_qutusundaki_say + $satilan_ededle_say);
                        $qalan_say  = floor($qalan__ededle_say/$row->bir_qutusundaki_say).' qutu,'.($qalan__ededle_say - floor($qalan__ededle_say/$row->bir_qutusundaki_say) * $row->bir_qutusundaki_say) .' ədəd';
                    }
                    else
                    {
                        $qalan_say = $row->say - $row->satis_details()->sum('satis_miqdari_ededle').' ədəd';
                    }
                    return $qalan_say;
                })

                ->editColumn('firma_id',function ($row){
                    return $row->firma ? $row->firma->ad : '<span class="badge badge-danger" style="background-color: red">Silinib</span>';
                })

                ->editColumn('istehsalci_id',function ($row){
                    return $row->istehsalci->ad;
                })

                ->editColumn('kateqoriya_id',function ($row){
                    return $row->kateqoriya->ad;
                })

                ->editColumn('marka_id',function ($row){
                    return $row->marka->ad;
                })

                ->editColumn('vahid_id',function ($row){
                    return $row->vahid->ad;
                })

                ->editColumn('bir_qutusundaki_say',function ($row){
                    return $row->vahid_id == 1 ? $row->bir_qutusundaki_say : '';
                })

                ->editColumn('qutudaki_1_malin_maya_deyeri',function ($row){
                    return $row->vahid_id == 1 ? $row->qutudaki_1_malin_maya_deyeri : '';
                })

                ->editColumn('qutudaki_1_malin_topdan_deyeri',function ($row){
                    return $row->vahid_id == 1 ? $row->qutudaki_1_malin_topdan_deyeri : '';
                })

                ->editColumn('qutudaki_1_malin_nagd_deyeri',function ($row){
                    return $row->vahid_id == 1 ? $row->qutudaki_1_malin_nagd_deyeri : '';
                })

                ->editColumn('qutudaki_1_malin_kredit_deyeri',function ($row){
                    return $row->vahid_id == 1 ? $row->qutudaki_1_malin_kredit_deyeri : '';
                })

                ->addColumn('action',function ($row){
                    return '
                    <div class="btn-list flex-nowrap">
                        <a href="'.route('mehsul.edit',$row->id).'" class="btn btn-primary">
                            <i class="fa fa-pen"></i>
                        </a>
                        <a href="javascript:void(0)" class="btn btn-info proMap"  data-bs-toggle="modal" data-bs-target="#modal-team" data-id="'.$row->id.'">
                            <i class="fa fa-map"></i>
                        </a>
                        <div class="">
                            <form action="'.route('mehsul.destroy',$row->id).'" method="POST">
                                '.csrf_field().'
                                '.method_field('DELETE').'
                                <button class="btn btn-danger" type="submit" onclick="return confirm(\'Silmek istədiyinizdən əminsiniz?\')"><i class="fa fa-times"></i></button>
                            </form>
                        </div>
                    </div>
                    ';
                })

                ->rawColumns(['action','firma_id'])

                ->make(true);
        }
        return view('back.pages.mehsul.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $firms          = Partnyor::latest()->get();
        $istehsalcis    = Istehsalci::latest()->get();
        $kateqoriyas    = Kateqoriya::latest()->get();
        $markas         = Marka::latest()->get();
        $vahids         = Vahid::latest()->get();
        if ($firms->count() == 0)
        {
            toastr()->warning('İlk öncə firma əlavə etməlisiz',env('xitab'));
            return redirect()->route('partnyor.create');
        }

        if ($istehsalcis->count() == 0)
        {
            toastr()->warning('İlk öncə istehsalçı əlavə etməlisiz',env('xitab'));
            return redirect()->route('istehsalci.create');
        }

        if ($kateqoriyas->count() == 0)
        {
            toastr()->warning('İlk öncə kateqoriya əlavə etməlisiz',env('xitab'));
            return redirect()->route('kateqoriya.create');
        }

        if ($markas->count() == 0)
        {
            toastr()->warning('İlk öncə model əlavə etməlisiz',env('xitab'));
            return redirect()->route('model.create');
        }

        if ($vahids->count() == 0)
        {
            toastr()->warning('İlk öncə vahid əlavə etməlisiz',env('xitab'));
            return redirect()->route('vahid.create');
        }

        return view('back.pages.mehsul.create', compact('firms','istehsalcis','kateqoriyas','markas','vahids'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMehsulRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMehsulRequest $request)
    {
        Mehsul::create([
            'ad'=>$request->ad,
            'firma_id'=>$request->firma_id,
            'istehsalci_id'=>$request->istehsalci_id,
            'kateqoriya_id'=>$request->kateqoriya_id,
            'marka_id'=>$request->marka_id,
            'qaime_nomresi'=>$request->qaime_nomresi,
            'tarix'=>$request->tarix,
            'vahid_id'=>$request->vahid_id,
            'maya_deyeri'=>$request->maya_deyeri,
            'topdan_deyeri'=>$request->topdan_deyeri,
            'nagd_deyeri'=>$request->nagd_deyeri,
            'kredit_deyeri'=>$request->kredit_deyeri,
            'say'=>$request->say,
            'qutudaki_1_malin_maya_deyeri'=>request()->vahid_id == 1 ? $request->qutudaki_1_malin_maya_deyeri : 0,
            'qutudaki_1_malin_topdan_deyeri'=>request()->vahid_id == 1 ? $request->qutudaki_1_malin_topdan_deyeri : 0,
            'qutudaki_1_malin_nagd_deyeri'=>request()->vahid_id == 1 ? $request->qutudaki_1_malin_nagd_deyeri : 0,
            'qutudaki_1_malin_kredit_deyeri'=>request()->vahid_id == 1 ? $request->qutudaki_1_malin_kredit_deyeri : 0,
            'bir_qutusundaki_say'=>request()->vahid_id == 1 ? $request->bir_qutusundaki_say : 0
        ]);

        toastr()->success('Əlavə edildi',env('xitab'));

        return redirect()->route('mehsul.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mehsul  $mehsul
     * @return \Illuminate\Http\Response
     */
    public function show(Mehsul $mehsul)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mehsul  $mehsul
     * @return \Illuminate\Http\Response
     */
    public function edit(Mehsul $mehsul)
    {
        $firms          = Partnyor::latest()->get();
        $istehsalcis    = Istehsalci::latest()->get();
        $kateqoriyas    = Kateqoriya::latest()->get();
        $markas         = Marka::latest()->get();
        $vahids         = Vahid::latest()->get();
        if ($firms->count() == 0)
        {
            toastr()->warning('İlk öncə firma əlavə etməlisiz',env('xitab'));
            return redirect()->route('partnyor.create');
        }

        if ($istehsalcis->count() == 0)
        {
            toastr()->warning('İlk öncə istehsalçı əlavə etməlisiz',env('xitab'));
            return redirect()->route('istehsalci.create');
        }

        if ($kateqoriyas->count() == 0)
        {
            toastr()->warning('İlk öncə kateqoriya əlavə etməlisiz',env('xitab'));
            return redirect()->route('kateqoriya.create');
        }

        if ($markas->count() == 0)
        {
            toastr()->warning('İlk öncə model əlavə etməlisiz',env('xitab'));
            return redirect()->route('model.create');
        }

        if ($vahids->count() == 0)
        {
            toastr()->warning('İlk öncə vahid əlavə etməlisiz',env('xitab'));
            return redirect()->route('vahid.create');
        }

        $item = $mehsul;
        return view('back.pages.mehsul.edit', compact('firms','istehsalcis','kateqoriyas','markas','vahids','item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMehsulRequest  $request
     * @param  \App\Models\Mehsul  $mehsul
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMehsulRequest $request, Mehsul $mehsul)
    {
        $mehsul->update([
            'ad'=>$request->ad,
            'firma_id'=>$request->firma_id,
            'istehsalci_id'=>$request->istehsalci_id,
            'kateqoriya_id'=>$request->kateqoriya_id,
            'marka_id'=>$request->marka_id,
            'qaime_nomresi'=>$request->qaime_nomresi,
            'tarix'=>$request->tarix,
            'vahid_id'=>$request->vahid_id,
            'maya_deyeri'=>$request->maya_deyeri,
            'topdan_deyeri'=>$request->topdan_deyeri,
            'nagd_deyeri'=>$request->nagd_deyeri,
            'kredit_deyeri'=>$request->kredit_deyeri,
            'say'=>$request->say,
            'qutudaki_1_malin_maya_deyeri'=>request()->vahid_id == 1 ? $request->qutudaki_1_malin_maya_deyeri : 0,
            'qutudaki_1_malin_topdan_deyeri'=>request()->vahid_id == 1 ? $request->qutudaki_1_malin_topdan_deyeri : 0,
            'qutudaki_1_malin_nagd_deyeri'=>request()->vahid_id == 1 ? $request->qutudaki_1_malin_nagd_deyeri : 0,
            'qutudaki_1_malin_kredit_deyeri'=>request()->vahid_id == 1 ? $request->qutudaki_1_malin_kredit_deyeri : 0,
            'bir_qutusundaki_say'=>request()->vahid_id == 1 ? $request->bir_qutusundaki_say : 0
        ]);

        toastr()->success('Redatə edildi',env('xitab'));

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mehsul  $mehsul
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mehsul $mehsul)
    {
        $mehsul->delete();

        toastr()->success('Silindi',env('xitab'));

        return redirect()->route('mehsul.index');
    }

    public function proMap(Request $request)
    {
        $this->validate($request,[
           'id'=>'required|exists:mehsuls,id'
        ],[],[
            'id'=>'Məhsul'
        ]);

        $mehsul = Mehsul::with('satis_details.satis')->findOrFail($request->id);

        $output = '';
        foreach ($mehsul->satis_details as $detail)
        {
            $output .= '
            <div class="list-group-item">
                <div class="row align-items-center">
                    <div class="col text-truncate">
                        <a onclick="window.location.href=\''.route('front.xronoliji',['id'=>$detail->satis->id]).'\'" href="javascript:void(0)" class="text-body d-block">№'.sprintf('%09d',$detail->satis->id).'</a>
                        <small class="d-block text-muted text-truncate mt-n1">'.$detail->satis->satici->name.' ('.$detail->satis->updated_at.')</small>
                    </div>
                </div>
            </div>
            ';
        }


        return response()->json([
            'name'=>$mehsul->ad,
            'body'=>$output
        ],200);
    }
}
