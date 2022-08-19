<?php

namespace App\Http\Controllers;

use App\Models\Kassa;
use App\Http\Requests\StoreKassaRequest;
use App\Http\Requests\UpdateKassaRequest;
use App\Models\Operation;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Yajra\DataTables\DataTables;

class KassaController extends Controller
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
            $data = Kassa::query()->with(['operation','satici']);

            return DataTables::of($data)

                ->editColumn('operation_id',function ($row){
                    return $row->operation ? $row->operation->name : '<span class="badge badge-danger" style="background-color: red">Silinib</span>';
                })

                ->editColumn('pul',function ($row){
                    return $row->pul < 0 ? round($row->pul * (-1),2) : round($row->pul,2);
                })

                ->editColumn('satici_id',function ($row){
                    return $row->satici ? $row->satici->name : '<span class="badge badge-danger" style="background-color: red">Silinib</span>';
                })

                ->editColumn('created_at', function ($row) {
                    return [
                        'display' => Carbon::parse($row->created_at)->format('d-m-Y H:i:s'),
                        'timestamp' => $row->created_at->timestamp
                    ];
                })

                ->addColumn('action',function ($row){
                    return $row->system == 0 ? '
                    <div class="btn-list flex-nowrap">
                        <a href="'.route('kassa.edit',$row->id).'" class="btn btn-primary">
                            <i class="fa fa-pen"></i>
                        </a>
                        <div class="">
                            <form action="'.route('kassa.destroy',$row->id).'" method="POST">
                                '.csrf_field().'
                                '.method_field('DELETE').'
                                <button class="btn btn-danger" type="submit" onclick="return confirm(\'Silmek istədiyinizdən əminsiniz?\')"><i class="fa fa-times"></i></button>
                            </form>
                        </div>
                    </div>
                    ' : '';
                })

                ->rawColumns(['action','operation_id','satici_id'])

                ->make(true);
        }
        return view('back.pages.kassa.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $operations = Operation::where('id','>',5)->get();
        return view('back.pages.kassa.create',compact('operations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKassaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKassaRequest $request)
    {
        Kassa::create([
            'operation_id'=>$request->operation_id,
            'pul'=>$request->pul,
            'description'=>$request->description,
            'satici_id'=>auth()->user()->id,
            'system'=>0,
        ]);

        toastr()->success('Əməliyyat uğurla icra olundu');
        return redirect()->route('kassa.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kassa  $kassa
     * @return \Illuminate\Http\Response
     */
    public function show(Kassa $kassa)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kassa  $kassa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $operations = Operation::where('id','>',5)->get();
        $kassa      = Kassa::where('system',0)->findOrFail($id);

        return view('back.pages.kassa.edit',compact('operations','kassa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKassaRequest  $request
     * @param  \App\Models\Kassa  $kassa
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKassaRequest $request, $id)
    {
        $kassa      = Kassa::where('system',0)->findOrFail($id);
        $kassa->update([
            'operation_id'=>$request->operation_id,
            'pul'=>$request->pul,
            'description'=>$request->description,
            'satici_id'=>auth()->user()->id,
            'system'=>0,
        ]);

        toastr()->success('Əməliyyat uğurla icra olundu');
        return redirect()->route('kassa.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kassa  $kassa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kassa      = Kassa::where('system',0)->findOrFail($id);
        $kassa->delete();
        toastr()->success('Əməliyyat uğurla icra olundu');
        return redirect()->route('kassa.index');
    }
}
