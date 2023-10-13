<?php

namespace App\Http\Requests\Hospital\Report;

use Illuminate\Foundation\Http\FormRequest;

class AddReportRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'patient_id'          =>      ['required','numeric'],
            'description'         =>      ['required'],
        ];
    }

    public function messages()
    {
        return [
            'patient_id.required'          =>   "المريض مطلوب",
            'patient_id.numeric'           =>   "رقم المريض غير صالح",
            'description.required'        =>   "التقرير مطلوب"
        ];
    }
}
