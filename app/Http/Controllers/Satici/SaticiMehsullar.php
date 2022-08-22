<?php

namespace App\Http\Controllers\Satici;

use App\Http\Controllers\Controller;
use App\Models\Mehsul;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SaticiMehsullar extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax())
        {
            $data = Mehsul::query()
                ->with(['firma','istehsalci','kateqoriya','marka','vahid']);

            return DataTables::of($data)

                ->addIndexColumn()

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

                ->rawColumns(['firma_id'])

                ->make(true);
        }
        return view('front.pages.mehsul.index');
    }
}
