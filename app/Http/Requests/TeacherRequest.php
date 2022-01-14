<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'firstName' => ['required', 'string'],
            'lastName' => ['required', 'string'],
            'dateOfBirth' => ['required', 'date'],
            'joiningDate' => ['required', 'date'],
            'gender' => ['required', 'string'],
            'wilayaId' => ['required', 'numeric', 'exists:wilayas,id'],
            'materialId' => ['required', 'numeric', 'exists:materials,id'],
            'roomId' => ['required']
        ];
    }
}
