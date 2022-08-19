<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UpdateEmeliyyatNovuRequest extends FormRequest
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
        return [
            'ad'=>[
                'required',
                'max:200',
                Rule::unique('operations','name')->where(function ($query) use ($request) {
                    return $query->where('id','!=',$request->segment('3'));
                })
            ],
            'description'=>'nullable|max:10000',
            'giris_ve_ya_cixis'=>['required',Rule::in([1,2])],
        ];
    }

    public function attributes()
    {
        return [
            'ad'=>'Ad',
            'description'=>'Təsvir',
            'giris_ve_ya_cixis'=>'Status'
        ];
    }
}
