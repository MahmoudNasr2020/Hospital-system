<?php

namespace App\Http\Requests\Hospital\Invoice;

use Illuminate\Foundation\Http\FormRequest;

class PayInvoiceRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id'                =>      ['required','integer'],
            'paid'                      =>      ['required','numeric'],
        ];
    }

    public function messages()
    {
        return [
            'id.required'                  =>   "الرقم التعريفي مطلوب",
            'id.integer'                   =>   "الرقم التعريفي يجب ان يكون رقم صحيح",
            'paid.required'                        =>   "المبلغ المدفوع مطلوب",
            'paid.numeric'                         =>   "المبلغ المدفوع يجب ان يكون رقمي"
        ];
    }
}
