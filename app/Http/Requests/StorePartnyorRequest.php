<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePartnyorRequest extends FormRequest
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
            'ad'=>'required|max:255',
            'tel_1'=>'nullable|max:255',
            'tel_2'=>'nullable|max:255',
            'tel_3'=>'nullable|max:255',
            'fb'=>'nullable|max:255',
            'insta'=>'nullable|max:255',
            'telegram'=>'nullable|max:255',
            'wp'=>'nullable|max:255',
            'email'=>'nullable|max:255',
            'unvan'=>'nullable|max:255',
        ];
    }

    public function attributes()
    {
        return [
            'ad'=>'Ad',
            'tel_1'=>'Telefon 1',
            'tel_2'=>'Telefon 2',
            'tel_3'=>'Telefon 3',
            'fb'=>'Facebook',
            'insta'=>'Instagram',
            'telegram'=>'Telegram',
            'wp'=>'Whatsapp',
            'email'=>'Email',
            'unvan'=>'Ünvan',
        ];
    }
}
