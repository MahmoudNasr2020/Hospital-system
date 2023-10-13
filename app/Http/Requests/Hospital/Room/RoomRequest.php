<?php

namespace App\Http\Requests\Hospital\Room;

use Illuminate\Foundation\Http\FormRequest;

class RoomRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'room_number'          =>      ['required','string','unique:rooms,room_number,'.$this->id],
            'beds'                 =>      ['required','numeric'],
            'department_id'        =>      ['required','not_in:0'],
        ];
    }

    public function messages()
    {
        return [
            'room_number.required'             =>   "رقم الغرفة مطلوب",
            'room_number.string'               =>   "رقم الغرفة غير صالح",
            'room_number.unique'               =>   "هذه الغرفة موجودة بالفعل",
            'beds.required'                    =>   "عدد السرائر مطلوب",
            'beds.numeric'                     =>   "عدد السرائر يجب ان تكرن رقمية",
            'department_id.required'           =>   "القسم مطلوب",
            'department_id.not_in'             =>   "يجب اختيار القسم",
        ];
    }
}

