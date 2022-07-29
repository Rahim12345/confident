<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Validation\Rule;

class StoreSatisRequest extends FormRequest
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
    public function rules(Request $request)
    {
        $rules = [
            'alici_kateqoriya_id'=>['required',Rule::in([1,2,3,4])],
            'satis_usulu_id'=>['required','exists:satis_usulus,id']
        ];

        if ($request->alici_kateqoriya_id == 1 || $request->alici_kateqoriya_id == 2){
            $rules['musterinin_id'] = ['required','exists:users,id'];
        }

        if ($request->alici_kateqoriya_id == 3){
            $rules['musterinin_id'] = ['required','exists:klinikas,id'];
        }

        if ($request->alici_kateqoriya_id == 4){
            $rules['musterinin_id'] = ['required','exists:partnyors,id'];
        }

        if ($request->satis_usulu_id == 3){
            $rules['ilkin_odenis'] = ['required','numeric','between:0,999999'];
            $rules['odenis_tarixleri'] = ['required','array'];
            $rules['odenis_tarixleri.*'] = ['required'];
        }
        return $rules;
    }

    public function attributes()
    {
        return [
            'alici_kateqoriya_id'=>'Alıcı kateqoriyası',
            'musterinin_id'=>'Müştəri',
            'satis_usulu_id'=>'Satış üsulu',
            'ilkin_odenis'=>'İlkin ödəniş',
            'odenis_tarixleri.*'=>'Ödəniş Cədvəli',
        ];
    }
}
