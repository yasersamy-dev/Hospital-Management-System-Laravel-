<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreAppointmentRequest extends FormRequest
{
      public function authorize(): bool
    {
        return true; 
    }

    public function rules(): array
    {
        return [
            'doctor_id' => 'required|exists:doctors,id',
            'day'       => 'required|string',

            'patient_name' => 'required|string|max:255',
            'patient_phone'=> 'required|string|max:20',

            'appointment_time' => [
                'required',
                Rule::unique('appointments')->where(function ($query) {
                    return $query->where('doctor_id', $this->doctor_id)
                                 ->where('day', $this->day);
                }),
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'doctor_id.required' => 'الدكتور مطلوب',
            'doctor_id.exists'   => 'الدكتور غير موجود',

            'day.required'       => 'من فضلك اختر اليوم',

            'patient_name.required' => 'اسم المريض مطلوب',
            'patient_phone.required'=> 'رقم الهاتف مطلوب',

            'appointment_time.required' => 'من فضلك اختر وقت الحجز',
            'appointment_time.unique'   => 'هذا الموعد محجوز بالفعل، اختر وقتًا آخر',
        ];
    }
}
