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
            'istehsalci_id'=>'??stehsal????',
            'kateqoriya_id'=>'Kateqoriya',
            'marka_id'=>'Model',
            'qaime_nomresi'=>'Qaim?? n??mr??si',
            'tarix'=>'Tarix',
            'say'=>'Say',
            'vahid_id'=>'Vahid',
            'maya_deyeri'=>'Maya d??y??ri',
            'topdan_deyeri'=>'Topdan d??y??ri',
            'nagd_deyeri'=>'Na??d d??y??ri',
            'kredit_deyeri'=>'Kredit d??y??ri',
            'bir_qutusundaki_say'=>'Bir qutusundak?? say',
            'qutudaki_1_malin_maya_deyeri'=>'Qutudak?? 1 mal??n maya d??y??ri',
            'qutudaki_1_malin_topdan_deyeri'=>'Qutudak?? 1 mal??n topdan d??y??ri',
            'qutudaki_1_malin_nagd_deyeri'=>'Qutudak?? 1 mal??n na??d d??y??ri',
            'qutudaki_1_malin_kredit_deyeri'=>'Qutudak?? 1 mal??n kredit d??y??ri',
        ];
    }
}
