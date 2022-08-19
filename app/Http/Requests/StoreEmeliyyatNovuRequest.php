<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreEmeliyyatNovuRequest extends FormRequest
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
            'ad'=>'required|max:200|unique:operations,name',
            'description'=>'nullable|max:10000',
            'giris_ve_ya_cixis'=>['required',Rule::in([1,2])],
        ];
    }

    public function attributes()
    {
        return [
            'ad'=>'Ad',
            'description'=>'Təsvir',
            'giris_ve_ya_cixis'=>'Status',
        ];
    }
}
