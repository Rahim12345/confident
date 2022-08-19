<?php

namespace App\Http\Controllers;

use App\Models\HisseCedvel;
use App\Models\Kassa;
use App\Models\Klinika;
use App\Models\LogSatis;
use App\Models\LogSatisDetallari;
use App\Models\Mehsul;
use App\Models\Partnyor;
use App\Models\Satis;
use App\Models\SatisUsulu;
use App\Models\User;
use App\Traits\WhatsappMessenger;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class MuqavilelerController extends Controller
{
    use WhatsappMessenger;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax())
        {
            if (auth()->user()->id == 1)
            {
                $data = Satis::with('satis_usulu','satici')
                    ->latest()
                    ->get();
            }
            else
            {
                $data = Satis::with('satis_usulu','satici')
                    ->where('satici_id',auth()->user()->id)
                    ->latest()
                    ->get();
            }


            return DataTables::of($data)

                ->editColumn('satis_usulu_id',function ($row){
                    return $row->satis_usulu ? $row->satis_usulu->ad : '<span class="badge badge-danger" style="background-color: red">Silinib</span>';
                })

                ->editColumn('musteri_novu',function ($row){
                    $output = '';
                    if ($row->musteri_novu == 1)
                    {
                        $output = 'həkim';
                    }
                    elseif ($row->musteri_novu == 2)
                    {
                        $output = 'texnik';
                    }
                    elseif ($row->musteri_novu == 3)
                    {
                        $output = 'klinika';
                    }
                    elseif ($row->musteri_novu == 4)
                    {
                        $output = 'firma';
                    }

                    return $output;
                })

                ->editColumn('musterinin_id',function ($row){
                    $musteri = '';
                    if ($row->musteri_novu == 1 || $row->musteri_novu == 2)
                    {
                        $user = User::whereId($row->musterinin_id)->first();
                        $musteri    = $user ? $user->name : '<span class="badge badge-danger" style="background-color: red">Silinib</span>';
                    }
                    elseif ($row->musteri_novu == 3)
                    {
                        $klinika    = Klinika::whereId($row->musterinin_id)->first();
                        if ($klinika)
                        {
                            if ($klinika->ad)
                            {
                                $musteri = $klinika->ad;
                            }
                            else
                            {
                                $musteri = $klinika->hekim_adi;
                            }
                        }
                        else
                        {
                            $musteri    = '<span class="badge badge-danger" style="background-color: red">Silinib</span>';
                        }
                    }
                    elseif ($row->musteri_novu == 4)
                    {
                        $firma      = Partnyor::whereId($row->musterinin_id)->first();
                        $musteri    = $firma ? $firma->ad : '<span class="badge badge-danger" style="background-color: red">Silinib</span>';
                    }

                    return $musteri;
                })

                ->editColumn('satici_id',function ($row){
                    $satici = User::whereId($row->satici_id)->first();

                    return $satici ? $satici->name : '<span class="badge badge-danger" style="background-color: red">Silinib</span>';
                })

                ->editColumn('created_at', function ($row) {
                    return [
                        'display' => Carbon::parse($row->created_at)->format('d-m-Y H:i:s'),
                        'timestamp' => $row->created_at->timestamp
                    ];
                })

                ->addColumn('action',function ($row){
                    return '
                    <div class="btn-list flex-nowrap">
                        '.($row->details()->count() > 0 ? ' <a href="'.route('muqavileler.edit',$row->id).'" style="display: '.(auth()->user()->id == 1 ? 'none' : '').'" class="btn btn-primary">
                            <i class="fa fa-pen"></i>
                        </a> ' : '').'
                        <a href="'.route('front.xronoliji',$row->id).'" class="btn btn-info">
                            Xronloji
                        </a>
                        '.($row->details()->count() > 0 ? '<div class=""  style="display: '.(auth()->user()->id == 1 ? 'none' : '').'">
                            <form action="'.route('muqavileler.destroy',$row->id).'" method="POST">
                                '.csrf_field().'
                                '.method_field('DELETE').'
                                <button class="btn btn-danger" type="submit" onclick="return confirm(\'Müqaviləni ləğv etmək istədiyinizdən əminsiniz?\')">Tam iadə</button>
                            </form>
                        </div>' : '').($row->satis_usulu_id == 3 ? '<a href="'.route('front.pay',$row->id).'" class="btn btn-info" style="display: '.($row->details()->count() > 0 ? '' : 'none').'">
                            <i class="fa fa-coins"></i>
                        </a>' : '').'
                    </div>
                    ';
                })

                ->rawColumns(['satis_usulu_id','musterinin_id','satici_id','action'])

                ->make(true);
        }

        if (auth()->user()->id == 1)
        {
            return view('back.pages.muqavile.index');
        }
        else
        {
            return view('front.pages.muqavile.index');
        }
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
        $satis          = Satis::with('details.mehsul')->where('satici_id',auth()->user()->id)->findOrFail($id);
        Cookie::queue(
            Cookie::forget('sebet')
        );

        if ($satis->musteri_novu == '1' || $satis->musteri_novu == '2')
        {
            $musteris = User::where('id','>',1)->where('hekim_vezife_id',$satis->musteri_novu)->get();
        }
        elseif ($satis->musteri_novu == '3')
        {
            $musteris = Klinika::orderBy('ad','asc')->get();
        }
        elseif ($satis->musteri_novu == '4')
        {
            $musteris = Partnyor::orderBy('ad','asc')->get();
        }

        if ($satis->details()->count() == 0)
        {
            toastr()->warning('Bu müqavilə tam iadə olunub');
        }
        return view('front.pages.satis.satis-edit',[
            'satis'=>$satis,
            'musteris'=>$musteris,
            'mehsullar'=>Mehsul::orderBy('ad','asc')->get()->unique('ad')
        ]);
    }

    public function setSebet(Request $request)
    {
        $satis          = Satis::with('details.mehsul')->findOrFail($request->id);
        $sebet          = [];
        foreach ($satis->details as $detail)
        {
            $mehsul = Mehsul::with('satis_details')->findOrFail($detail->mehsul_id);
            $preSay = '';
            $cari_mehsul_uzre_satilmis_mehsul_sayi  = 0;
            foreach ($mehsul->satis_details as $satis_detail)
            {
                $cari_mehsul_uzre_satilmis_mehsul_sayi  += $satis_detail->qutu_sayi * $mehsul->bir_qutusundaki_say + $satis_detail->satis_miqdari_ededle;
            }

            if ($mehsul->vahid_id == 2)
            {
                $qaime_uzre_gelen_mehsul_sayi           = $mehsul->say;
                $preSay                                 = ($qaime_uzre_gelen_mehsul_sayi - $cari_mehsul_uzre_satilmis_mehsul_sayi) .' ədəd';
            }
            else
            {
                $qaime_uzre_gelen_mehsul_sayi           = $mehsul->say * $mehsul->bir_qutusundaki_say;
                $preSay                                 = floor(($qaime_uzre_gelen_mehsul_sayi - $cari_mehsul_uzre_satilmis_mehsul_sayi) / $mehsul->bir_qutusundaki_say).' qutu '.(($qaime_uzre_gelen_mehsul_sayi - $cari_mehsul_uzre_satilmis_mehsul_sayi) - floor(($qaime_uzre_gelen_mehsul_sayi - $cari_mehsul_uzre_satilmis_mehsul_sayi) / $mehsul->bir_qutusundaki_say) * $mehsul->bir_qutusundaki_say).' ədəd';
            }

            $sebet[$detail->mehsul_id]    = [
                'qutu_sayi'=>$detail->qutu_sayi,
                'ededle_sayi'=>$detail->satis_miqdari_ededle,
                'qutusunun_qiymeti'=>$detail->qutusunun_faktiki_satildigi_qiymet,
                'bir_ededinin_qiymeti'=>$detail->bir_ededinin_faktiki_satildigi_qiymeti,
                'vahid'=>$detail->mehsul->vahid_id == 1 ? 'qutu' : 'ədəd',
                'satis_usulu_id'=>$satis->satis_usulu_id,
                'pretext'=>'<b>'.$mehsul->ad.' - <u>'.$detail->mehsul->qaime_nomresi.'</u> <i> qaimə üzrə '.$preSay.'</i></b>',
            ];
        }

        return response()->json([
            'products'=>$sebet,
            'message'=>__('Məhsul səbətə əlavə edildi')
        ], 200)->withCookie(Cookie::forever('sebet', serialize($sebet)));
    }

    public function xronoliji($id, $log_id = null)
    {
        if ($log_id)
        {
            if (auth()->user()->id == 1)
            {
                $cariSatis          = LogSatis::with('satis_usulu','satici','details','hisse_cedvels')->findOrFail($log_id);
            }
            else
            {
                $cariSatis          = LogSatis::where('satici_id', auth()->user()->id)->with('satis_usulu','satici','details','hisse_cedvels')->findOrFail($log_id);
            }

        }
        else
        {
            if (auth()->user()->id == 1)
            {
                $cariSatis          = Satis::with('satis_usulu','satici','details','hisse_cedvels')->findOrFail($id);
            }
            else
            {
                $cariSatis          = Satis::where('satici_id', auth()->user()->id)->with('satis_usulu','satici','details','hisse_cedvels')->findOrFail($id);
            }

        }
//        dd($cariSatis);

        $arxivSatislari         = LogSatis::with('satis_usulu','satici','details','hisse_cedvels')->orderBy('id','desc')->where('satis_id',$id)->get();

        if (auth()->user()->id == 1)
        {
            return view('back.pages.satis.xronoloji',compact('cariSatis','arxivSatislari'));
        }
        else
        {
            return view('front.pages.satis.xronoloji',compact('cariSatis','arxivSatislari'));
        }
    }

    public function pay($id, $log_id = null)
    {
        if ($log_id)
        {
            if (auth()->user()->id == 1)
            {
                $cariSatis          = LogSatis::with('satis_usulu','satici','details','hisse_cedvels')->where('satis_usulu_id',3)->findOrFail($log_id);
            }
            else
            {
                $cariSatis          = LogSatis::where('satis_usulu_id',3)->where('satici_id', auth()->user()->id)->with('satis_usulu','satici','details','hisse_cedvels')->findOrFail($log_id);
            }

        }
        else
        {
            if (auth()->user()->id == 1)
            {
                $cariSatis          = Satis::with('satis_usulu','satici','details','hisse_cedvels')->where('satis_usulu_id',3)->findOrFail($id);
            }
            else
            {
                $cariSatis          = Satis::where('satis_usulu_id',3)->where('satici_id', auth()->user()->id)->with('satis_usulu','satici','details','hisse_cedvels')->findOrFail($id);
            }

        }
//        dd($cariSatis);

        $arxivSatislari         = LogSatis::with('satis_usulu','satici','details','hisse_cedvels')->orderBy('id','desc')->where('satis_id',$id)->get();

        if (auth()->user()->id == 1)
        {
            return view('back.pages.satis.xronoloji',compact('cariSatis','arxivSatislari'));
        }
        else
        {
            return view('front.pages.satis.pay',compact('cariSatis','arxivSatislari'));
        }
    }

    public function payStore(Request $request)
    {
        $this->validate($request,[
           'odenilen_mebleg'=>'array',
           'odenilen_mebleg.*'=>'numeric',
        ]);

        $satis                      = Satis::with('hisse_cedvels')->findOrFail($request->satis_id);

        $yeni_edilmis_odenisler     = array_sum($request->edilen_odenisler);
        $kohne_edilmis_odenisler    = $satis->hisse_cedvels->sum('odenilen_mebleg');
        $qalan_borc                 = $satis->details()->sum(DB::raw('qutu_sayi * qutusunun_faktiki_satildigi_qiymet + satis_miqdari_ededle * bir_ededinin_faktiki_satildigi_qiymeti')) -
                                        $satis->ilkin_odenis - $kohne_edilmis_odenisler;
        $muqaviledekiPulFerqi       = $yeni_edilmis_odenisler - $kohne_edilmis_odenisler;
//        dd($yeni_edilmis_odenisler.'-'.$kohne_edilmis_odenisler);
        if ($qalan_borc < $yeni_edilmis_odenisler)
        {
            return response()->json([
                'errors'=>[
                    'borcdan_artiq'=>'Qalan borcdan('.$qalan_borc.' AZN) çox ödəniş etməyə çalışmıyın'
                ]
            ],422);
        }

        if($yeni_edilmis_odenisler < $kohne_edilmis_odenisler)
        {
            return response()->json([
                'errors'=>[
                    'odenisde_azalama'=>'Ödəniş edərkən ödəniş cədvəlindəki ödənişlərin cəmi, əvvəlki ödənişlərin cəmində çox olmalıdır'
                ]
            ],422);
        }

        $n      = 0;
        foreach ($satis->hisse_cedvels as $row)
        {
            $row->update([
                'odenilen_mebleg'=>$request->edilen_odenisler[$n],
                'serh'=>$request->description[$n],
            ]);
            $n++;
        }

        $myMessage = '';
        if ($muqaviledekiPulFerqi > 0)
        {
            $myMessage = 'Ödəniş edildi, yönləndirilirsiniz ...';
            $message = auth()->user()->name.' adlı '.auth()->user()->vezife->ad.' № '.sprintf('%09d',$satis->id).'  müqaviləsi üzrə '.$satis->satis_usulu->ad.' satışı üzrə ödəniş etdi və nəticədə kassaya '.round(abs($muqaviledekiPulFerqi),2).' AZN pul daxil etdi .Ətraflı > '.route('front.xronoliji',['id'=>$satis->id]);
            Kassa::create([
                'operation_id'=>3,
                'pul'=>abs($muqaviledekiPulFerqi),
                'description'=>$message,
                'satici_id'=>auth()->user()->id
            ]);

            $this->sender(urlencode($message));
        }

        return response()->json([
            'message'=>$myMessage
        ],200);
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
        $old_satis  = Satis::with('details')->findOrFail($id);

        if ($old_satis->satis_usulu_id == 3)
        {
            $muqaviledekiPulFerqi = $old_satis->ilkin_odenis + $old_satis->hisse_cedvels->sum('odenilen_mebleg');
        }
        else
        {
            $muqaviledekiPulFerqi = $old_satis->ilkin_odenis;
        }

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
                HisseCedvel::create([
                    'satis_id'=>$row->satis_id,
                    'odenis_tarixi'=>$row->odenis_tarixi,
                    'serh'=>$row->serh,
                ]);
            }
            $old_satis->hisse_cedvels()->delete();
        }

        $old_satis->update([
           'ilkin_odenis'=>0
        ]);

        $message = auth()->user()->name.' adlı '.auth()->user()->vezife->ad.' № '.sprintf('%09d',$old_satis->id).'  müqaviləsi üzrə '.$old_satis->satis_usulu->ad.' satışını tam iadə etdi və nəticədə kassadan '.$muqaviledekiPulFerqi.' AZN pul müstəriyə verdi.Ətraflı > '.route('front.xronoliji',['id'=>$old_satis->id]);
        Kassa::create([
            'operation_id'=>$old_satis->satis_usulu_id,
            'pul'=>$muqaviledekiPulFerqi * (-1),
            'description'=>$message,
            'satici_id'=>auth()->user()->id
        ]);

        $this->sender(urlencode($message));

        toastr()->success('Müqavilə tam iadə olundu');
        return  back();
    }
}
