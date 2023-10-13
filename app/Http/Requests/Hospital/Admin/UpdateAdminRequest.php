<?php

namespace App\Http\Requests\Hospital\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAdminRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name'          =>        ['required','string'],
            'user_name'     =>        ['required','alpha_dash','min:10',Rule::unique('users','user_name')->ignore($this->id,'id')],
            'password'      =>        ['sometimes','nullable','confirmed'],
            'status'        =>        ['required','not_in:0'],
            'image'        =>         ['sometimes','nullable','image','max:2048'],
        ];
    }

    /** @noinspection DuplicatedCode */
    public function messages()
    {
        return [
            'name.required'=>'الاسم مطلوب',
            'name.string'=>'الاسم غير صالح',
            'user_name.required'=>'اسم المستخدم مطلوب',
            'user_name.alpha_dash'=>'اسم المستخدم غير صالح',
            'user_name.unique'=>'اسم المستخدم موجود بالفعل',
            'user_name.min'=>'اسم المستخدم يجب ان يكون 10 عناصر',
            'password.confirmed'=>'كلمة السر غير متطابقة',
            'status.required'=>'الحالة مطلوبة',
            'status.not_in'=>'يجب اختيار الحالة',
            'image.image' => 'الصورة غير صالحة',
            'image.max' => 'حجم الصورة يجب ان يكون اقل من 2048',


        ];
    }
}
