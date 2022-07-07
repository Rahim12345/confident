<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

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
    public function rules(Request $request)
    {
        return [
            'ad'=>'required|max:200',
            'dogum_gunu'=>'nullable|date',
            'klinika_id'=>'nullable|exists:klinikas,id',
            'hvezife_id'=>'nullable|exists:hekim_vezives,id',
            'tel_1'=>'nullable|max:200',
            'tel_2'=>'nullable|max:200',
            'tel_3'=>'nullable|max:200',
            'fb'=>'nullable|max:200',
            'insta'=>'nullable|max:200',
            'telegram'=>'nullable|max:200',
            'wp'=>'nullable|max:200',
            'email'=>$request->has('status') ? 'required|email|max:200' : 'nullable|email|max:200',
            'password'=>$request->has('status') ? 'required|max:200' : 'nullable|max:200',
            'vezife_id'=>$request->has('status') ? 'required|exists:vezives,id' : 'nullable|exists:vezives,id',
            'magaza_id'=>$request->has('status') ? 'required|exists:magazas,id' : 'nullable|exists:magazas,id',
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
            'password'=>'Şifrə',
            'vezife_id'=>'Vəzifə',
            'hvezife_id'=>'Həkim vəzifə',
            'magaza_id'=>'Mağaza',
        ];
    }
}
