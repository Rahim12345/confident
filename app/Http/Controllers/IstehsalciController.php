<?php

namespace App\Http\Controllers;

use App\Models\Istehsalci;
use App\Http\Requests\StoreIstehsalciRequest;
use App\Http\Requests\UpdateIstehsalciRequest;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class IstehsalciController extends Controller
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
            $data = Istehsalci::latest()
                ->get();

            return DataTables::of($data)

                ->addColumn('action',function ($row){
                    return '
                    <div class="btn-list flex-nowrap">
                        <a href="'.route('istehsalci.edit',$row->id).'" class="btn btn-primary">
                            <i class="fa fa-pen"></i>
                        </a>
                        <div class="">
                            <form action="'.route('istehsalci.destroy',$row->id).'" method="POST">
                                '.csrf_field().'
                                '.method_field('DELETE').'
                                <button class="btn btn-danger" type="submit" onclick="return confirm(\'Silmek istədiyinizdən əminsiniz?\')"><i class="fa fa-times"></i></button>
                            </form>
                        </div>
                    </div>
                    ';
                })

                ->rawColumns(['action'])

                ->make(true);
        }
        return view('back.pages.istehsalci.index',[
            'istehsalcis'=>Istehsalci::orderBy('ad')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.pages.istehsalci.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreIstehsalciRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIstehsalciRequest $request)
    {
        Istehsalci::create([
            'ad'=>$request->ad,
            'olke'=>$request->olke
        ]);

        toastr()->success('Əlavə edildi',env('xitab'));

        return redirect()->route('istehsalci.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Istehsalci  $istehsalci
     * @return \Illuminate\Http\Response
     */
    public function show(Istehsalci $istehsalci)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Istehsalci  $istehsalci
     * @return \Illuminate\Http\Response
     */
    public function edit(Istehsalci $istehsalci)
    {
        return view('back.pages.istehsalci.edit',[
            'item'=>$istehsalci
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateIstehsalciRequest  $request
     * @param  \App\Models\Istehsalci  $istehsalci
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateIstehsalciRequest $request, Istehsalci $istehsalci)
    {
        $istehsalci->update([
            'ad'=>$request->ad,
            'olke'=>$request->olke
        ]);

        toastr()->success('Redatə edildi',env('xitab'));

        return redirect()->route('istehsalci.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Istehsalci  $istehsalci
     * @return \Illuminate\Http\Response
     */
    public function destroy(Istehsalci $istehsalci)
    {
        $istehsalci->delete();

        toastr()->success('Silindi',env('xitab'));

        return redirect()->route('istehsalci.index');
    }
}
