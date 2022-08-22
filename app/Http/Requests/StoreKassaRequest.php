<?php

namespace App\Http\Requests;

use App\Models\Operation;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class StoreKassaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $max = 999999999.99;
        if (request()->operation_id)
        {
            $operation = Operation::findOrFail(request()->operation_id);
            if ($operation->giris_ve_ya_cixis == 2)
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

                if ($totalUmumi < request()->pul)
                {
                    $max = $totalUmumi;
                }
            }
        }


        $rules = [
            'operation_type'=>['required',Rule::in([1,2,3])],
            'operation_id'=>'required|exists:operations,id',
            'pul'=>'numeric|between:0.01,'.$max,
            'description'=>'nullable|max:60000'
        ];

        if (request()->operation_type == 1)
        {
            $rules['personal_id'] = 'required|exists:users,id';
        }
        elseif (request()->operation_type == 2)
        {
            $rules['firma_id'] = 'required|exists:partnyors,id';
        }
        return $rules;
    }

    public function attributes()
    {
        return [
            'operation_type'=>'Operation Type',
            'operation_id'=>'Operation',
            'pul'=>'Pul',
            'description'=>'Təsvir',
            'personal_id'=>'Personal',
            'firma_id'=>'Firma',
        ];
    }
}
