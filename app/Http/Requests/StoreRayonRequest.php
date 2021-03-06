<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRayonRequest extends FormRequest
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
            'ad'=>'required|max:200|unique:rayons,ad',
            'seher_id'=>'nullable|exists:sehers,id'
        ];
    }

    public function attributes()
    {
        return [
            'ad'=>'Ad',
            'seher_id'=>'Şəhər'
        ];
    }
}
