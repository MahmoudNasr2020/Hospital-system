<?php

namespace App\Http\Requests\Hospital\Department;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'          =>      ['required','string','unique:departments,name,'.$this->id],
            'description'   =>      ['nullable','string'],
        ];
    }

    public function messages()
    {
        return [
            'name.required'          =>   "اسم القسم مطلوب",
            'name.string'            =>   "اسم القسم غير صالح",
            'name.unique'            =>   "هذا القسم موجود بالفعل",
            'description.string'     =>   "وصف القسم غير صالح"
        ];
    }
}

