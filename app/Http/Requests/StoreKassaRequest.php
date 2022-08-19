<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
        return [
            'operation_id'=>'required|exists:operations,id',
            'pul'=>'numeric|between:0.01,999999999.99',
            'description'=>'nullable|max:60000'
        ];
    }

    public function attributes()
    {
        return [
            'operation_id'=>'Operation',
            'pul'=>'Pul',
            'description'=>'Təsvir'
        ];
    }
}
