<?php

namespace App\Http\Requests\Hospital\Login;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'user_name' => ['required'],
            'password'  => ['required']
        ];
    }

    public function messages()
    {
        return [
            'user_name.required'=>'اسم المستخدم مطلوب',
            'password.required'=>' كلمة المرور مطلوبة',
        ];
    }
}
