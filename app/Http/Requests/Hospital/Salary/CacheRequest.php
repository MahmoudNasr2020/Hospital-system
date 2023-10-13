<?php

namespace App\Http\Requests\Hospital\Salary;

use Illuminate\Foundation\Http\FormRequest;

class CacheRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'incentives'        =>      ['required','numeric'],
            'discounts'         =>      ['required','numeric']
        ];
    }

    public function messages()
    {
        return [
            'incentives.required'           =>   "الحوافز مطلوبة",
            'incentives.numeric'           =>   "الحوافز يجب ان تكون رقمية",
            'discounts.required'           =>   "الخصومات مطلوبة",
            'discounts.numeric'           =>   "الخصومات يجب ان تكون رقمية",
        ];
    }
}
