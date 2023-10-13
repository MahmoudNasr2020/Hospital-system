<?php

namespace App\Http\Requests\Hospital\Invoice;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInvoiceRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'invoice_id'               =>      ['required','integer'],
            'total'                     =>      ['required','numeric'],
        ];
    }

    public function messages()
    {
        return [
            'invoice_id.required'                  =>   "الرقم التعريفي مطلوب",
            'invoice_id.integer'                   =>   "الرقم التعريفي يجب ان يكون رقم صحيح",
            'total.required'               =>   "المبلغ الاجمالي مطلوب",
            'total.numeric'                =>   "المبلغ الاجمالي يجب ان يكون رقمي"
        ];
    }
}
