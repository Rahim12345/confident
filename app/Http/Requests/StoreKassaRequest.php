<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
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
        $rules = [
            'operation_type'=>['required',Rule::in([1,2,3])],
            'operation_id'=>'required|exists:operations,id',
            'pul'=>'numeric|between:0.01,999999999.99',
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
