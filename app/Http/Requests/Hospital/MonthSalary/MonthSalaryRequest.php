<?php

namespace App\Http\Requests\Hospital\MonthSalary;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MonthSalaryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'month'          =>      ['required','numeric',Rule::unique('month_salaries')->where(function ($query){
                                                                    return $query->where('year','=',$this->year);
                                                                    })->ignore($this->id)],
            'year'           =>      ['required','numeric','not_in:0','date_format:Y'],
        ];
    }

    public function messages()
    {
        return [
            'month.required'           =>   "الشهر مطلوب",
            'month.numeric'            =>   "نوع الشهر غير صالح",
            'month.unique'            =>   "هذا الشهر موجود بالفعل",
            //'name.unique'            =>   "هذا القسم موجود بالفعل",
            'year.required'            =>   "السنة مطلوبة",
            'year.not_in'            =>   "السنة مطلوبة",
            'year.numeric'             =>   "نوع السنة غير صالح",
            'year.date_format'                =>   "السنة غير صالحة",
        ];
    }
}
