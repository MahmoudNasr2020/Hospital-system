<?php

namespace App\Http\Requests\Hospital\Role;

use Illuminate\Foundation\Http\FormRequest;

class AddRoleRequest extends FormRequest
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


    public function rules()
    {
        return [
           'name' => ['required','string','unique:roles,name'],
            'permission'=>['required']
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'اسم الصلاحية مطلوب',
            'name.unique'=>'هذه الصلاحية موجوده بالفعل',
            'name.string'=>'اسم الصلاحية غير صالح',
            'permission.required'=>'الصلاحيات مطلوبة',
        ];
    }
}
