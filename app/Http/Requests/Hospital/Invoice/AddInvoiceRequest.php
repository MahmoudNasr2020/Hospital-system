<?php

namespace App\Http\Requests\Hospital\Invoice;

use Illuminate\Foundation\Http\FormRequest;

class AddInvoiceRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'patient_id'          =>      ['required','numeric'],
            'total'               =>      ['required','numeric'],
        ];
    }

    public function messages()
    {
        return [
            'patient_id.required'          =>   "المريض مطلوب",
            'patient_id.numeric'           =>   "رقم المريض غير صالح",
            'total.required'               =>   "المبلغ الاجمالي مطلوب",
            'total.numeric'                =>   "المبلغ الاجمال يجب ان يكون رقمي"
        ];
    }
}
