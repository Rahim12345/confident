<?php

namespace App\Http\Controllers;

use App\Models\HisseCedvel;
use App\Models\Istehsalci;
use App\Models\Klinika;
use App\Models\LogHisseCedvel;
use App\Models\LogSatis;
use App\Models\LogSatisDetallari;
use App\Models\Mehsul;
use App\Models\Partnyor;
use App\Models\Satis;
use App\Http\Requests\StoreSatisRequest;
use App\Http\Requests\UpdateSatisRequest;
use App\Models\SatisDetallari;
use App\Models\SatisUsulu;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Validation\Rule;

class SatisController extends Controller
{
    public function satisEt($id)
    {
        $satis_usulu = SatisUsulu::findOrFail($id);

        if($id == 4)
        {
            abort(404,'Bu səhifə tezliklə hazırlanacaq');
        }
        Cookie::queue(
            Cookie::forget('sebet')
        );

        return view('front.pages.satis.satis',[
            'satis_usulu'=>$satis_usulu,
            'mehsullar'=>Mehsul::orderBy('ad','asc')->get()->unique('ad')
        ]);
    }

    public function getCustomers(Request $request)
    {
        $this->validate($request,[
           'alici_kateqoriya_id'=>['required',Rule::in([1,2,3,4])]
        ],[
            'alici_kateqoriya_id.required'=>'Lütfən bir Alıcı kateqoriyası seçin',
            'alici_kateqoriya_id.in'=>'Lütfən bir Alıcı kateqoriyası seçin',
        ],[
            'alici_kateqoriya_id'=>'Alıcı kateqoriyası seçin'
        ]);

        if ($request->alici_kateqoriya_id == 1 || $request->alici_kateqoriya_id == 2)
        {
            $musteriler = User::where('id','>',1)
                ->where('hekim_vezife_id', $request->alici_kateqoriya_id)
                ->select('id','name as text')
                ->get()
                ->toArray();
        }
        elseif ($request->alici_kateqoriya_id == 3)
        {
            $musteriler = Klinika::orderBy('ad','asc')
                ->select('id','ad as text')
                ->get()
                ->toArray();
        }
        elseif ($request->alici_kateqoriya_id == 4)
        {
            $musteriler = Partnyor::orderBy('ad','asc')
                ->select('id','ad as text')
                ->get()
                ->toArray();
        }
        else
        {
            $musteriler = [];
        }

        array_unshift( $musteriler, ['id'=>'','text'=>'Birini seçin']);
        return response($musteriler,200);
    }

    public function getFirmas(Request $request)
    {
        $this->validate($request,[
            'mehsulun_adi'=>['required']
        ],[],[
            'mehsulun_adi'=>'Məhsulun adı'
        ]);

        $firma_ids              = Mehsul::where('ad',$request->mehsulun_adi)->pluck('firma_id')->toArray();

        $firmas                 = Partnyor::whereIn('id',$firma_ids)->select('id','ad as text')->get()->toArray();


        array_unshift( $firmas, ['id'=>'','text'=>'Birini seçin']);


        return response([
            'firmas'=>$firmas,
        ], 200);
    }

    public function getIstehsalcis(Request $request)
    {
        $this->validate($request,[
            'mehsulun_adi'=>['required'],
            'firma_id'=>['required','exists:mehsuls,firma_id']
        ],[],[
            'firma_id'=>'Firma',
            'mehsulun_adi'=>'Məhsulun adı'
        ]);

        $istehsalci_id_ids      = Mehsul::where('ad',$request->mehsulun_adi)
            ->where('firma_id',$request->firma_id)
            ->pluck('istehsalci_id')
            ->toArray();
        $istehsalcis            = Istehsalci::whereIn('id',$istehsalci_id_ids)->select('id','ad as text')->get()->toArray();
        array_unshift( $istehsalcis, ['id'=>'','text'=>'Birini seçin']);
        return response([
            'istehsalcis'=>$istehsalcis,
        ], 200);
    }

    public function getMehsuls(Request $request)
    {
        $this->validate($request,[
           'firma_id'=>'required|exists:mehsuls,firma_id',
           'mehsulun_adi'=>'required|exists:mehsuls,ad',
           'istehsalci_id'=>'required|exists:mehsuls,istehsalci_id',
           'satis_usulu_id'=>'required|exists:satis_usulus,id',
        ],[],[
            'firma_id'=>'Firma',
            'mehsulun_adi'=>'Məhsulun adı',
            'istehsalci_id'=>'İstehsalçı'
        ]);


        $mehsuls = Mehsul::with('satis_details')
            ->where('ad',$request->mehsulun_adi)
            ->where('firma_id',$request->firma_id)
            ->where('istehsalci_id',$request->istehsalci_id)
            ->get();
        $output = $this->prepareProducts($request->satis_usulu_id, $mehsuls);

        return response($output, 200);
    }

    private function prepareProducts($satis_usulu_id, $mehsuls)
    {
        $output = '';
        foreach ($mehsuls as $mehsul)
        {
            $bir_qutunun_qiymeti            = 0;
            $qutudaki_1_malin_deyeri        = 0;
            $bir_ededinin_qiymeti           = 0;
            if ($satis_usulu_id == 1)
            {
                if ($mehsul->vahid_id == 1)
                {
                    $bir_qutunun_qiymeti       = $mehsul->topdan_deyeri;
                    $qutudaki_1_malin_deyeri   = $mehsul->qutudaki_1_malin_topdan_deyeri;
                }
                else
                {
                    $bir_ededinin_qiymeti      = $mehsul->topdan_deyeri;
                }
            }
            elseif ($satis_usulu_id == 2 || $satis_usulu_id == 3)
            {
                if ($mehsul->vahid_id == 1)
                {
                    $bir_qutunun_qiymeti       = $mehsul->nagd_deyeri;
                    $qutudaki_1_malin_deyeri   = $mehsul->qutudaki_1_malin_nagd_deyeri;
                }
                else
                {
                    $bir_ededinin_qiymeti      = $mehsul->nagd_deyeri;
                }
            }

            if ($mehsul->vahid_id == 1)
            {
                $cari_mehsul_uzre_satilmis_mehsul_sayi  = 0;
                foreach ($mehsul->satis_details as $satis_detail)
                {
                    $cari_mehsul_uzre_satilmis_mehsul_sayi  += $satis_detail->qutu_sayi * $mehsul->bir_qutusundaki_say + $satis_detail->satis_miqdari_ededle;
                }
                $qaime_uzre_gelen_mehsul_sayi           = $mehsul->say * $mehsul->bir_qutusundaki_say;

                if ($qaime_uzre_gelen_mehsul_sayi - $cari_mehsul_uzre_satilmis_mehsul_sayi != 0)
                {
                    $output .= '<tr class="proInfo" data-id="'.$mehsul->id.'">';
                    $output .= '<td rowspan="2" style="text-align:center; vertical-align:middle"><b><u>'.$mehsul->qaime_nomresi.'</u> <i> qaimə üzrə '.floor(($qaime_uzre_gelen_mehsul_sayi - $cari_mehsul_uzre_satilmis_mehsul_sayi) / $mehsul->bir_qutusundaki_say).' qutu '.(($qaime_uzre_gelen_mehsul_sayi - $cari_mehsul_uzre_satilmis_mehsul_sayi) - floor(($qaime_uzre_gelen_mehsul_sayi - $cari_mehsul_uzre_satilmis_mehsul_sayi) / $mehsul->bir_qutusundaki_say) * $mehsul->bir_qutusundaki_say).' ədəd </i></b></td>';
                    $output .= '<td style="border-bottom-width: 0px"><input type="number" min="0" value="0" max="'.floor(($qaime_uzre_gelen_mehsul_sayi - $cari_mehsul_uzre_satilmis_mehsul_sayi) / $mehsul->bir_qutusundaki_say).'" class="proListQutuSayi" data-id="'.$mehsul->id.'"  oninput="this.value = this.value.replace(/[^0-9.]/g, \'\').replace(/(\..*?)\..*/g, \'$1\');" onkeypress="return isNumberKey(event);" onkeyup="this.value.trim() == \'\' ? (this.value = 1) : (this.value = this.value) "></td>';
                    $output .= '<td style="border-bottom-width: 0px">qutu x </td>';
                    $output .= '<td style="border-bottom-width: 0px"><input type="number" min="0" value="'.$bir_qutunun_qiymeti.'" step=".01"  class="proListBirQutununQiymeti" data-id="'.$mehsul->id.'" oninput="this.value = this.value.replace(/[^0-9.]/g, \'\').replace(/(\..*?)\..*/g, \'$1\');" onkeypress="return isNumberKey(event);" onkeyup="this.value.trim() == \'\' ? (this.value = 1) : (this.value = this.value) "> man</td>';
                    $output .= '<td rowspan="2" style="text-align:center; vertical-align:middle"><button class="btn btn-primary proListBtn" data-action="1" data-id="'.$mehsul->id.'"><i class="fa fa-plus"></i></button></td>';
                    $output .= '</tr>';
                    $output .= '<tr class="proInfo" data-id="'.$mehsul->id.'">';
                    $output .= '<td><input type="number" min="0" value="0" class="proListEdedLeSay" data-id="'.$mehsul->id.'"  oninput="this.value = this.value.replace(/[^0-9.]/g, \'\').replace(/(\..*?)\..*/g, \'$1\');" onkeypress="return isNumberKey(event);" onkeyup="this.value.trim() == \'\' ? (this.value = 1) : (this.value = this.value) "></td>';
                    $output .= '<td> ədəd x </td>';
                    $output .= '<td><input type="number" min="0" value="'.$qutudaki_1_malin_deyeri.'" step=".01" class="proListBirEdedininQiymeti" data-id="'.$mehsul->id.'" oninput="this.value = this.value.replace(/[^0-9.]/g, \'\').replace(/(\..*?)\..*/g, \'$1\');" onkeypress="return isNumberKey(event);" onkeyup="this.value.trim() == \'\' ? (this.value = 1) : (this.value = this.value) "> man</td>';
                    $output .= '</tr>';
                }
            }
            else
            {
                $cari_mehsul_uzre_satilmis_mehsul_sayi  = 0;
                foreach ($mehsul->satis_details as $satis_detail)
                {
                    $cari_mehsul_uzre_satilmis_mehsul_sayi  += $satis_detail->qutu_sayi * $mehsul->bir_qutusundaki_say + $satis_detail->satis_miqdari_ededle;
                }
                $qaime_uzre_gelen_mehsul_sayi           = $mehsul->say;

                if ($qaime_uzre_gelen_mehsul_sayi - $cari_mehsul_uzre_satilmis_mehsul_sayi != 0)
                {
                    $output .= '<tr class="proInfo" data-id="'.$mehsul->id.'">';
                    $output .= '<td style="text-align:center; vertical-align:middle"><b><u>'.$mehsul->qaime_nomresi.'</u> <i> qaimə üzrə '.($qaime_uzre_gelen_mehsul_sayi - $cari_mehsul_uzre_satilmis_mehsul_sayi).' ədəd </i></b></td>';
                    $output .= '<td><input type="number" min="0" value="0" max="'.($qaime_uzre_gelen_mehsul_sayi - $cari_mehsul_uzre_satilmis_mehsul_sayi).'" class="proListEdedLeSay" data-id="'.$mehsul->id.'"></td>';
                    $output .= '<td>  ədəd x  </td>';
                    $output .= '<td><input type="number" min="0" value="'.$bir_ededinin_qiymeti.'" step=".01" class="proListBirEdedininQiymeti" data-id="'.$mehsul->id.'"> man</td>';
                    $output .= '<td style="text-align:center; vertical-align:middle"><button class="btn btn-primary proListBtn" data-action="2" data-id="'.$mehsul->id.'"><i class="fa fa-plus"></i></button></td>';
                    $output .= '</tr>';
                }
            }
        }

        return $output;
    }

    public function sebeteAt(Request $request)
    {
//        action ədəd və ya qutunu təmsil edir.
        if ($request->action == 1)
        {
            $this->validate($request,[
                'mehsul_id'=>'required|exists:mehsuls,id',
                'qutu_sayi'=>'required|integer|between:0,999999',
                'ededle_sayi'=>'required|integer|between:0,999999',
                'qutusunun_qiymeti'=>'required|numeric|between:0,999999',
                'bir_ededinin_qiymeti'=>'required|numeric|between:0,999999',
                'satis_usulu_id'=>'required|exists:satis_usulus,id',
            ]);

            $mehsul = Mehsul::with('satis_details')->findOrFail($request->mehsul_id);

            $sifaris_olunan_say                     = $request->qutu_sayi * $mehsul->bir_qutusundaki_say + $request->ededle_sayi;
            $cari_mehsul_uzre_satilmis_mehsul_sayi  = 0;
            foreach ($mehsul->satis_details as $satis_detail)
            {
                $cari_mehsul_uzre_satilmis_mehsul_sayi  += $satis_detail->qutu_sayi * $mehsul->bir_qutusundaki_say + $satis_detail->satis_miqdari_ededle;
            }
            $qaime_uzre_gelen_mehsul_sayi           = $mehsul->say * $mehsul->bir_qutusundaki_say;


            $cari_muqavile_uzre_satilmis_mehsul_sayi = 0;
            if ($request->has('crud'))
            {
                $satilmis_cari_mehsul = SatisDetallari::where('satis_id',$request->satis_id)->where('mehsul_id',$request->mehsul_id)->first();
                if ($satilmis_cari_mehsul)
                {
                    $cari_muqavile_uzre_satilmis_mehsul_sayi = $satilmis_cari_mehsul->qutu_sayi * $mehsul->bir_qutusundaki_say + $satilmis_cari_mehsul->satis_miqdari_ededle;
                }
            }


            if ($sifaris_olunan_say > $qaime_uzre_gelen_mehsul_sayi - $cari_mehsul_uzre_satilmis_mehsul_sayi + $cari_muqavile_uzre_satilmis_mehsul_sayi)
            {
                return response()->json([
                    'errors'=>[
                        'hedden_artiq_mehsul_sifarisi'=>'Bazadakı məhsuldan artıq məhsul sifariş etmək olmaz'
                    ]
                ],422);
            }

            $sebet  = unserialize(Cookie::get('sebet'));
            $sebet[$request->mehsul_id]    = [
                'qutu_sayi'=>$request->qutu_sayi,
                'ededle_sayi'=>$request->ededle_sayi,
                'qutusunun_qiymeti'=>$request->qutusunun_qiymeti,
                'bir_ededinin_qiymeti'=>$request->bir_ededinin_qiymeti,
                'vahid'=>'qutu',
                'satis_usulu_id'=>$request->satis_usulu_id,
                'pretext'=>'<b>'.$mehsul->ad.' - <u>'.$mehsul->qaime_nomresi.'</u> <i> qaimə üzrə '.floor(($qaime_uzre_gelen_mehsul_sayi - $cari_mehsul_uzre_satilmis_mehsul_sayi) / $mehsul->bir_qutusundaki_say).' qutu '.(($qaime_uzre_gelen_mehsul_sayi - $cari_mehsul_uzre_satilmis_mehsul_sayi) - floor(($qaime_uzre_gelen_mehsul_sayi - $cari_mehsul_uzre_satilmis_mehsul_sayi) / $mehsul->bir_qutusundaki_say) * $mehsul->bir_qutusundaki_say).' ədəd</i></b>',
            ];

            return response()->json([
                'products'=>$sebet,
                'message'=>__('Məhsul səbətə əlavə edildi')
            ], 200)->withCookie(Cookie::forever('sebet', serialize($sebet)));
        }
        elseif ($request->action == 2)
        {
            $this->validate($request,[
                'mehsul_id'=>'required|exists:mehsuls,id',
                'ededle_sayi'=>'required|integer|between:0,999999',
                'bir_ededinin_qiymeti'=>'required|numeric|between:0,999999',
                'satis_usulu_id'=>'required|exists:satis_usulus,id',
            ]);

            $mehsul = Mehsul::with('satis_details')->findOrFail($request->mehsul_id);
            $sifaris_olunan_say                     = $request->qutu_sayi * $mehsul->bir_qutusundaki_say + $request->ededle_sayi;
            $cari_mehsul_uzre_satilmis_mehsul_sayi  = 0;
            foreach ($mehsul->satis_details as $satis_detail)
            {
                $cari_mehsul_uzre_satilmis_mehsul_sayi  += $satis_detail->qutu_sayi * $mehsul->bir_qutusundaki_say + $satis_detail->satis_miqdari_ededle;
            }
            $qaime_uzre_gelen_mehsul_sayi           = $mehsul->say;

            $cari_muqavile_uzre_satilmis_mehsul_sayi = 0;
            if ($request->has('crud'))
            {
                $satilmis_cari_mehsul = SatisDetallari::where('satis_id',$request->satis_id)->where('mehsul_id',$request->mehsul_id)->first();
                if ($satilmis_cari_mehsul)
                {
                    $cari_muqavile_uzre_satilmis_mehsul_sayi = $satilmis_cari_mehsul->qutu_sayi * $mehsul->bir_qutusundaki_say + $satilmis_cari_mehsul->satis_miqdari_ededle;
                }
            }

            if ($sifaris_olunan_say > $qaime_uzre_gelen_mehsul_sayi - $cari_mehsul_uzre_satilmis_mehsul_sayi + $cari_muqavile_uzre_satilmis_mehsul_sayi)
            {
                return response()->json([
                    'errors'=>[
                        'hedden_artiq_mehsul_sifarisi'=>'Bazadakı məhsuldan artıq məhsul sifariş etmək olmaz'
                    ]
                ],422);
            }


            $sebet  = unserialize(Cookie::get('sebet'));
            $sebet[$request->mehsul_id]    = [
                'qutu_sayi'=>0,
                'ededle_sayi'=>$request->ededle_sayi,
                'qutusunun_qiymeti'=>0,
                'bir_ededinin_qiymeti'=>$request->bir_ededinin_qiymeti,
                'vahid'=>'ədəd',
                'satis_usulu_id'=>$request->satis_usulu_id,
                'pretext'=>'<b>'.$mehsul->ad.' - <u>'.$mehsul->qaime_nomresi.'</u> <i> qaimə üzrə '.($qaime_uzre_gelen_mehsul_sayi - $cari_mehsul_uzre_satilmis_mehsul_sayi).' ədəd </i></b>',
            ];

            return response()->json([
                'products'=>$sebet,
                'message'=>__('Məhsul səbətə əlavə edildi')
            ], 200)->withCookie(Cookie::forever('sebet', serialize($sebet)));
        }
    }

    public function sebetiCagir(Request $request)
    {
        $sebet      = unserialize(Cookie::get('sebet'));
        $total      = 0;
        $output     = '';
        if ($sebet)
        {
            $output     = '
            <tr class="proInfo proInfoSebetim">
                <td colspan="5" style="background-color: green !important;font-weight: bold;color: #FFFFFF !important;">SƏBƏT</td>
            </tr>
            ';
            foreach ($sebet as $key=>$mehsul)
            {
                if ($mehsul['vahid'] == 'qutu')
                {
                    $output .= '<tr class="proInfo proInfoSebetim" data-id="'.$key.'">';
                    $output .= '<td rowspan="2" style="text-align:center; vertical-align:middle">'.$mehsul['pretext'].'</td>';
                    $output .= '<td style="border-bottom-width: 0px"><input type="number" min="0" value="'.$mehsul['qutu_sayi'].'" class="proListQutuSayi" data-id="'.$key.'"  oninput="this.value = this.value.replace(/[^0-9.]/g, \'\').replace(/(\..*?)\..*/g, \'$1\');" onkeypress="return isNumberKey(event);" onkeyup="this.value.trim() == \'\' ? (this.value = 1) : (this.value = this.value) "></td>';
                    $output .= '<td style="border-bottom-width: 0px">qutu x </td>';
                    $output .= '<td style="border-bottom-width: 0px"><input type="number" min="0" value="'.$mehsul['qutusunun_qiymeti'].'" step=".01"  class="proListBirQutununQiymeti" data-id="'.$key.'" oninput="this.value = this.value.replace(/[^0-9.]/g, \'\').replace(/(\..*?)\..*/g, \'$1\');" onkeypress="return isNumberKey(event);" onkeyup="this.value.trim() == \'\' ? (this.value = 1) : (this.value = this.value) "> man</td>';
                    $output .= '<td rowspan="2" style="text-align:center; vertical-align:middle"><button class="btn btn-primary proListBtn" data-action="1" data-id="'.$key.'"><i class="fa fa-pen"></i></button><button class="btn btn-danger proListDeleterBtn" data-action="1" data-id="'.$key.'"><i class="fa fa-times"></i></button></td>';
                    $output .= '</tr>';
                    $output .= '<tr class="proInfo proInfoSebetim">';
                    $output .= '<td><input type="number" min="0" value="'.$mehsul['ededle_sayi'].'" class="proListEdedLeSay" data-id="'.$key.'"  oninput="this.value = this.value.replace(/[^0-9.]/g, \'\').replace(/(\..*?)\..*/g, \'$1\');" onkeypress="return isNumberKey(event);" onkeyup="this.value.trim() == \'\' ? (this.value = 1) : (this.value = this.value) "></td>';
                    $output .= '<td> ədəd x </td>';
                    $output .= '<td><input type="number" min="0" value="'.$mehsul['bir_ededinin_qiymeti'].'" step=".01" class="proListBirEdedininQiymeti" data-id="'.$key.'" oninput="this.value = this.value.replace(/[^0-9.]/g, \'\').replace(/(\..*?)\..*/g, \'$1\');" onkeypress="return isNumberKey(event);" onkeyup="this.value.trim() == \'\' ? (this.value = 1) : (this.value = this.value) "> man</td>';
                    $output .= '</tr>';
                    $total  += $mehsul['qutu_sayi'] * $mehsul['qutusunun_qiymeti'] + $mehsul['ededle_sayi'] * $mehsul['bir_ededinin_qiymeti'];
                }
                else
                {
                    $output .= '<tr class="proInfo proInfoSebetim" data-id="'.$key.'">';
                    $output .= '<td style="text-align:center; vertical-align:middle">'.$mehsul['pretext'].'</td>';
                    $output .= '<td><input type="number" min="0" value="'.$mehsul['ededle_sayi'].'" class="proListEdedLeSay" data-id="'.$key.'"></td>';
                    $output .= '<td>  ədəd x  </td>';
                    $output .= '<td><input type="number" min="0" value="'.$mehsul['bir_ededinin_qiymeti'].'" step=".01" class="proListBirEdedininQiymeti" data-id="'.$key.'"> man</td>';
                    $output .= '<td style="text-align:center; vertical-align:middle"><button class="btn btn-primary proListBtn" data-action="2" data-id="'.$key.'"><i class="fa fa-pen"></i></button><button class="btn btn-danger proListDeleterBtn" data-action="2" data-id="'.$key.'"><i class="fa fa-times"></i></button></td>';
                    $output .= '</tr>';
                    $total  += $mehsul['ededle_sayi'] * $mehsul['bir_ededinin_qiymeti'];
                }
            }

            $output     .= '
            <tr class="proInfo proInfoSebetim">
                <td></td>
                <td></td>
                <td></td>
                <td style="font-weight: bold;color: #FFFFFF !important;">'.$total.' man</td>
                <td></td>
            </tr>
            ';
        }

        return response($output, 200);
    }

    public function productRemoval(Request $request)
    {
        $this->validate($request,[
            'deleting_mehsul_id'=>'required|exists:mehsuls,id'
        ]);
        $sebet      = unserialize(Cookie::get('sebet'));
        unset($sebet[$request->deleting_mehsul_id]);

        return \response([
            'message'=>'Məhsul səbətdən çıxarıldı',
            'products'=>$sebet
        ],200)->withCookie(Cookie::forever('sebet', serialize($sebet)));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreSatisRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSatisRequest $request)
    {
        $request->merge(["sebet"=>unserialize(Cookie::get('sebet'))]);
        if($request->sebet === false || empty($request->sebet))
        {
            return response()->json([
                'errors'=>[
                    'bos_sebet'=>'Səbət boşdur'
                ]
            ],422);
        }

        if ($request->has('crud'))
        {
            $old_satis  = Satis::with('details')->findOrFail($request->satis_id);
            $log_satis  = LogSatis::create([
                'satis_id'=>$old_satis->id,
                'satis_usulu_id'=>$old_satis->satis_usulu_id,
                'musteri_novu'=>$old_satis->musteri_novu,
                'musterinin_id'=>$old_satis->musterinin_id,
                'satici_id'=>$old_satis->satici_id,
                'ilkin_odenis'=>$old_satis->ilkin_odenis
            ]);

            foreach ($old_satis->details as $detail)
            {
                LogSatisDetallari::create([
                    'log_satis_id'=>$log_satis->id,
                    'satis_id'=>$detail->satis_id,
                    'mehsul_id'=>$detail->mehsul_id,
                    'qutu_sayi'=>$detail->qutu_sayi,
                    'qutusunun_cari_qiymeti'=>$detail->qutusunun_cari_qiymeti,
                    'qutusunun_faktiki_satildigi_qiymet'=>$detail->qutusunun_faktiki_satildigi_qiymet,
                    'satis_miqdari_ededle'=>$detail->satis_miqdari_ededle,
                    'bir_ededinin_cari_qiymeti'=>$detail->bir_ededinin_cari_qiymeti,
                    'bir_ededinin_faktiki_satildigi_qiymeti'=>$detail->bir_ededinin_faktiki_satildigi_qiymeti,
                ]);
            }
            $old_satis->details()->delete();

            if ($old_satis->satis_usulu_id == 3)
            {
                foreach ($old_satis->hisse_cedvels as $row)
                {
                    LogHisseCedvel::create([
                        'log_satis_id'=>$log_satis->id,
                        'satis_id'=>$row->satis_id,
                        'odenis_tarixi'=>$row->odenis_tarixi,
                        'serh'=>$row->serh,
                    ]);
                }
                $old_satis->hisse_cedvels()->delete();
            }

            $total = 0;
            foreach ($request->sebet as $mehsul)
            {
                $total  += $mehsul['qutu_sayi'] * $mehsul['qutusunun_qiymeti'] + $mehsul['ededle_sayi'] * $mehsul['bir_ededinin_qiymeti'];
            }

            $old_satis->update([
                'satis_usulu_id'=>$request->satis_usulu_id,
                'musteri_novu'=>$request->alici_kateqoriya_id,
                'musterinin_id'=>$request->musterinin_id,
                'satici_id'=>auth()->user()->id,
                'ilkin_odenis'=>$request->satis_usulu_id == 3 ? $request->ilkin_odenis :$total
            ]);

            foreach ($request->sebet as $key=>$mehsul)
            {
                $dbMehsul = Mehsul::findOrFail($key);
                $qutusunun_cari_qiymeti     = 0;
                $bir_ededinin_cari_qiymeti  = 0;
                if ($request->satis_usulu_id == 1)
                {
                    $qutusunun_cari_qiymeti     = $dbMehsul->vahid_id == 1 ? $dbMehsul->topdan_deyeri : 0;
                    $bir_ededinin_cari_qiymeti  = $dbMehsul->vahid_id == 1 ?  $dbMehsul->qutudaki_1_malin_topdan_deyeri : $dbMehsul->topdan_deyeri;
                }
                elseif ($request->satis_usulu_id == 2 || $request->satis_usulu_id == 3)
                {
                    $qutusunun_cari_qiymeti     = $dbMehsul->vahid_id == 1 ? $dbMehsul->nagd_deyeri : 0;
                    $bir_ededinin_cari_qiymeti  = $dbMehsul->vahid_id == 1 ?  $dbMehsul->qutudaki_1_malin_nagd_deyeri : $dbMehsul->nagd_deyeri;
                }
                SatisDetallari::create([
                    'satis_id'=>$old_satis->id,
                    'mehsul_id'=>$key,
                    'qutu_sayi'=>$mehsul['qutu_sayi'],
                    'qutusunun_cari_qiymeti'=>$qutusunun_cari_qiymeti,
                    'qutusunun_faktiki_satildigi_qiymet'=>$mehsul['qutusunun_qiymeti'],
                    'satis_miqdari_ededle'=>$mehsul['ededle_sayi'],
                    'bir_ededinin_cari_qiymeti'=>$bir_ededinin_cari_qiymeti,
                    'bir_ededinin_faktiki_satildigi_qiymeti'=>$mehsul['bir_ededinin_qiymeti'],
                ]);
            }

            if ($request->satis_usulu_id == 3)
            {
                $n = 0;
                foreach ($request->odenis_tarixleri as $tarix)
                {
                    HisseCedvel::create([
                        'satis_id'=>$old_satis->id,
                        'odenis_tarixi'=>$tarix,
                        'serh'=>$request->description[$n],
                    ]);
                    $n++;
                }
            }

        }
        else
        {
            $total = 0;
            foreach ($request->sebet as $mehsul)
            {
                $total  += $mehsul['qutu_sayi'] * $mehsul['qutusunun_qiymeti'] + $mehsul['ededle_sayi'] * $mehsul['bir_ededinin_qiymeti'];
            }

            $satis = Satis::create([
                'satis_usulu_id'=>$request->satis_usulu_id,
                'musteri_novu'=>$request->alici_kateqoriya_id,
                'musterinin_id'=>$request->musterinin_id,
                'satici_id'=>auth()->user()->id,
                'ilkin_odenis'=>$request->satis_usulu_id == 3 ? $request->ilkin_odenis :$total
            ]);

            foreach ($request->sebet as $key=>$mehsul)
            {
                $dbMehsul = Mehsul::findOrFail($key);
                $qutusunun_cari_qiymeti     = 0;
                $bir_ededinin_cari_qiymeti  = 0;
                if ($request->satis_usulu_id == 1)
                {
                    $qutusunun_cari_qiymeti     = $dbMehsul->vahid_id == 1 ? $dbMehsul->topdan_deyeri : 0;
                    $bir_ededinin_cari_qiymeti  = $dbMehsul->vahid_id == 1 ?  $dbMehsul->qutudaki_1_malin_topdan_deyeri : $dbMehsul->topdan_deyeri;
                }
                elseif ($request->satis_usulu_id == 2 || $request->satis_usulu_id == 3)
                {
                    $qutusunun_cari_qiymeti     = $dbMehsul->vahid_id == 1 ? $dbMehsul->nagd_deyeri : 0;
                    $bir_ededinin_cari_qiymeti  = $dbMehsul->vahid_id == 1 ?  $dbMehsul->qutudaki_1_malin_nagd_deyeri : $dbMehsul->nagd_deyeri;
                }
                SatisDetallari::create([
                    'satis_id'=>$satis->id,
                    'mehsul_id'=>$key,
                    'qutu_sayi'=>$mehsul['qutu_sayi'],
                    'qutusunun_cari_qiymeti'=>$qutusunun_cari_qiymeti,
                    'qutusunun_faktiki_satildigi_qiymet'=>$mehsul['qutusunun_qiymeti'],
                    'satis_miqdari_ededle'=>$mehsul['ededle_sayi'],
                    'bir_ededinin_cari_qiymeti'=>$bir_ededinin_cari_qiymeti,
                    'bir_ededinin_faktiki_satildigi_qiymeti'=>$mehsul['bir_ededinin_qiymeti'],
                ]);
            }

            if ($request->satis_usulu_id == 3)
            {
                $n = 0;
                foreach ($request->odenis_tarixleri as $tarix)
                {
                    HisseCedvel::create([
                        'satis_id'=>$satis->id,
                        'odenis_tarixi'=>$tarix,
                        'serh'=>$request->description[$n],
                    ]);
                    $n++;
                }
            }
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Satis  $satis
     * @return \Illuminate\Http\Response
     */
    public function show(Satis $satis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Satis  $satis
     * @return \Illuminate\Http\Response
     */
    public function edit(Satis $satis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSatisRequest  $request
     * @param  \App\Models\Satis  $satis
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSatisRequest $request, Satis $satis)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Satis  $satis
     * @return \Illuminate\Http\Response
     */
    public function destroy(Satis $satis)
    {
        //
    }
}
