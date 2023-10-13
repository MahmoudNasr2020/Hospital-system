<?php

namespace App\Http\Requests\Hospital\Receptionist;

use Illuminate\Foundation\Http\FormRequest;

class AddReceptionistRequest extends FormRequest
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
            'name'          =>        ['required','string'],
            'user_name'     =>        ['required','alpha_dash','unique:users,user_name','min:10'],
            'password'      =>        ['required','confirmed'],
            'identify_no'   =>        ['required','numeric','unique:laborers,identify_no'],
            //'department_id' =>        ['required','not_in:0'],
            'gender'        =>        ['required','not_in:0'],
            'status'        =>        ['required','not_in:0'],
            'salary'        =>        ['required','numeric'],
            'date_of_birth' =>        ['required','date_format:d/m/Y'],
            'mobile_phone' =>         ['required','unique:laborers,mobile_phone'],
            'home_phone'   =>         ['nullable'],
            'date_joining' =>         ['required','date_format:d/m/Y'],
            'image'        =>         ['nullable','image','max:2048'],
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'الاسم مطلوب',
            'name.string'=>'الاسم غير صالح',
            'user_name.required'=>'اسم المستخدم مطلوب',
            'user_name.alpha_dash'=>'اسم المستخدم غير صالح',
            'user_name.unique'=>'اسم المستخدم موجود بالفعل',
            'user_name.min'=>'اسم المستخدم يجب ان يكون 10 عناصر',
            'password.required'=>'كلمة السر مطلوبة',
            'password.confirmed'=>'كلمة السر غير متطابقة',
            'identify_no.required'=>'رقم الهوية مطلوب',
            'identify_no.numeric'=>'رقم الهوية غير صالح',
            'identify_no.unique'=>'رقم الهوية موجود بالفعل',
            'gender.required'=>'النوع مطلوب',
            'gender.not_in'=>'يجب اختيار النوع',
            'status.required'=>'الحالة مطلوبة',
            'status.not_in'=>'يجب اختيار الحالة',
            'salary.required'=>'الراتب مطلوب',
            'salary.numeric'=>'الراتب يجب ان يكرن رقمي',
            'date_of_birth.required'=>'تاريخ الميلاد مطلوب',
            'date_of_birth.date_format'=>'تاريخ الميلاد غير صالح',
            'mobile_phone.required'=>'رقم الموبايل مطلوب',
            'mobile_phone.unique'=>'رقم الموبايل موجود بالفعل',
            'date_joining.required'=>'تاريخ الالتحاق مطلوب',
            'date_joining.date_format'=>'تاريخ الالتحاق غير صالح',
            // 'image.required' => 'الصورة مطلوبة',
            'image.image' => 'الصورة غير صالحة',
            'image.max' => 'حجم الصورة يجب ان يكون اقل من 2048',
        ];
    }
}
