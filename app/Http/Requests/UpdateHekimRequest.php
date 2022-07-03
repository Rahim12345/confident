<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateHekimRequest extends FormRequest
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
            'ad'=>'required|max:200',
            'dogum_gunu'=>'nullable|date',
            'klinika_id'=>'nullable|exists:klinikas,id',
            'tel_1'=>'nullable|max:200',
            'tel_2'=>'nullable|max:200',
            'tel_3'=>'nullable|max:200',
            'fb'=>'nullable|max:200',
            'insta'=>'nullable|max:200',
            'telegram'=>'nullable|max:200',
            'wp'=>'nullable|max:200',
            'email'=>'nullable|max:200',
        ];
    }

    public function attributes()
    {
        return [
            'ad'=>'A.S.A',
            'dogum_gunu'=>'Doğum tarixi',
            'klinika_id'=>'Klinika',
            'tel_1'=>'Telefon 1',
            'tel_2'=>'Telefon 2',
            'tel_3'=>'Telefon 3',
            'fb'=>'Facebook',
            'insta'=>'Instagram',
            'telegram'=>'Telegram',
            'wp'=>'Whatsapp',
            'email'=>'Email',
        ];
    }
}
