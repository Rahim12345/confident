<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMehsulRequest extends FormRequest
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
            'firma_id'=>'required|exists:partnyors,id',
            'istehsalci_id'=>'required|exists:istehsalcis,id',
            'kateqoriya_id'=>'required|exists:kateqoriyas,id',
            'marka_id'=>'required|exists:markas,id',
            'qaime_nomresi'=>'nullable|max:255',
            'tarix'=>'nullable|date',
            'say'=>'required|integer|digits_between:1,5',
            'vahid_id'=>'required|exists:vahids,id',
            'maya_deyeri'=>'required|numeric|between:0.01,999999.99',
            'topdan_deyeri'=>'required|numeric|between:0.01,999999.99',
            'nagd_deyeri'=>'required|numeric|between:0.01,999999.99',
            'kredit_deyeri'=>'required|numeric|between:0.01,999999.99',
            'bir_qutusundaki_say'=>request()->vahid_id == 1 ? 'required|integer|digits_between:1,5' : 'nullable|integer|digits_between:1,5',
            'qutudaki_1_malin_maya_deyeri'=>request()->vahid_id == 1 ? 'required|numeric|between:0.01,999999.99' : 'nullable|numeric|between:0.01,999999.99',
            'qutudaki_1_malin_topdan_deyeri'=>request()->vahid_id == 1 ? 'required|numeric|between:0.01,999999.99' : 'nullable|numeric|between:0.01,999999.99',
            'qutudaki_1_malin_nagd_deyeri'=>request()->vahid_id == 1 ? 'required|numeric|between:0.01,999999.99' : 'nullable|numeric|between:0.01,999999.99',
            'qutudaki_1_malin_kredit_deyeri'=>request()->vahid_id == 1 ? 'required|numeric|between:0.01,999999.99' : 'nullable|numeric|between:0.01,999999.99',
        ];
    }

    public function attributes()
    {
        return [
            'ad'=>'Ad',
            'firma_id'=>'Firma',
            'istehsalci_id'=>'İstehsalçı',
            'kateqoriya_id'=>'Kateqoriya',
            'marka_id'=>'Model',
            'qaime_nomresi'=>'Qaimə nömrəsi',
            'tarix'=>'Tarix',
            'say'=>'Say',
            'vahid_id'=>'Vahid',
            'maya_deyeri'=>'Maya dəyəri',
            'topdan_deyeri'=>'Topdan dəyəri',
            'nagd_deyeri'=>'Nağd dəyəri',
            'kredit_deyeri'=>'Kredit dəyəri',
            'bir_qutusundaki_say'=>'Bir qutusundakı say',
            'qutudaki_1_malin_maya_deyeri'=>'Qutudakı 1 malın maya dəyəri',
            'qutudaki_1_malin_topdan_deyeri'=>'Qutudakı 1 malın topdan dəyəri',
            'qutudaki_1_malin_nagd_deyeri'=>'Qutudakı 1 malın nağd dəyəri',
            'qutudaki_1_malin_kredit_deyeri'=>'Qutudakı 1 malın kredit dəyəri',
        ];
    }
}
