<?php

namespace App\Http\Requests\Hospital\Report;

use Illuminate\Foundation\Http\FormRequest;

class UpdateReportRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'description'         =>      ['required'],
        ];
    }

    public function messages()
    {
        return [
            'description.required'        =>   "التقرير مطلوب"
        ];
    }
}
