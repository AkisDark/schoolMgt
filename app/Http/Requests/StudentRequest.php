<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
            //
            'firstName' => ['required', 'string'],
            'lastName' => ['required', 'string'],
            'dateOfBirth' => ['required', 'date'],
            'gender' => ['required', 'string'],
            'wilayaId' => ['required', 'numeric', 'exists:wilayas,id'],
            'parentId' => ['required', 'numeric', 'exists:parents,id'],
            'levelId' => ['required', 'numeric', 'exists:levels,id'],
            'roomId' => ['required', 'numeric', 'exists:rooms,id'],
            'specializationId' => ['required', 'numeric', 'exists:specializations,id'],
            
        ];
    }
}
