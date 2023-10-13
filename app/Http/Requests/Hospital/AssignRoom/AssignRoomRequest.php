<?php

namespace App\Http\Requests\Hospital\AssignRoom;

use Illuminate\Foundation\Http\FormRequest;

class AssignRoomRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'room'          =>      ['required','numeric','not_in:0'],
            'patient'       =>      ['required','numeric','not_in:0'],
        ];
    }

    public function messages()
    {
        return [
            'room.required'                    =>   "الغرفة مطلوب",
            'room.not_in'                     =>   "الغرفة مطلوب",
            'room.numeric'                      =>    "نوع الغرفة غير صالح",
            'patient.required'            =>   "المريض مطلوب",
            'patient.not_in'            =>   "المريض مطلوب",
            'patient.numeric'              =>    "نوع المريض غير صالح",
        ];
    }
}
