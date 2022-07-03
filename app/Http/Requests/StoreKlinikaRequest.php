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
            'kuce_adi'=>'nullable|max:200',
            'xerite'=>'nullable|max:20000',
            'tel_1'=>'nullable|max:200',
            'tel_2'=>'nullable|max:200',
            'tel_3'=>'nullable|max:200',
            'fb'=>'nullable|max:200',
            'insta'=>'nullable|max:200',
            'telegram'=>'nullable|max:200',
            'wp'=>'nullable|max:200',
            'email'=>'nullable|max:200',
            'rayon_id'=>'required|exists:rayons,id'
        ];
    }

    public function attributes()
    {
        return [
            'ad'=>'Ad(Klinika)',
            'hekim_adi'=>'Ad(Həkim)',
            'kuce_adi'=>'Küçə',
            'xerite'=>'Xəritə',
            'tel_1'=>'Telefon 1',
            'tel_2'=>'Telefon 2',
            'tel_3'=>'Telefon 3',
            'fb'=>'Facebook',
            'insta'=>'Instagram',
            'telegram'=>'Telegram',
            'wp'=>'Whatsapp',
            'email'=>'Email',
            'rayon_id'=>'Rayon'
        ];
    }
}
