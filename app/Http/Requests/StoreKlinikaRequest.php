<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreKlinikaRequest extends FormRequest
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
            'ad'=>'nullable|max:200',
            'hekim_adi'=>'nullable|max:200',
            'rayon_id'=>'required|exists:rayons,id'
        ];
    }

    public function attributes()
    {
        return [
            'ad'=>'Ad(Klinika)',
            'hekim_adi'=>'Ad(Həkim)',
            'rayon_id'=>'Rayon'
        ];
    }
}
