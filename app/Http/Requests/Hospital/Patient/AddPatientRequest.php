<?php

namespace App\Http\Requests\Hospital\Patient;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property mixed image
 * @property mixed password
 */
class AddPatientRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'          =>         ['required','string'],
            'identify_no'   =>         ['required','numeric','unique:patients,identify_no'],
            'address'       =>         ['nullable','string'],
            'gender'        =>         ['required','not_in:0'],
            'age'           =>         ['required','numeric'],
            'mobile_phone'  =>         ['nullable','unique:patients,mobile_phone'],
            'date_joining'  =>         ['required','date_format:d/m/Y'],
            'image'         =>         ['nullable','image','max:2048'],
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'الاسم مطلوب',
            'name.string'=>'الاسم غير صالح',
            'identify_no.required'=>'رقم الهوية مطلوب',
            'identify_no.numeric'=>'رقم الهوية غير صالح',
            'identify_no.unique'=>'رقم الهوية موجود بالفعل',
            'address.required'=>'العنوان مطلوب',
            'address.string'=>'العنوان غير صالح',
            'gender.required'=>'النوع مطلوب',
            'gender.not_in'=>'يجب اختيار النوع',
            'age.required'=>'العمر مطلوب',
            'age.numeric'=>'العمر يجب ان يكرن رقمي',
            'mobile_phone.unique'=>'رقم الموبايل موجود بالفعل',
            'date_joining.required'=>'تاريخ الدخول مطلوب',
            'date_joining.date_format'=>'تاريخ الدخول غير صالح',
            // 'image.required' => 'الصورة مطلوبة',
            'image.image' => 'الصورة غير صالحة',
            'image.max' => 'حجم الصورة يجب ان يكون اقل من 2048',
        ];
    }
}
