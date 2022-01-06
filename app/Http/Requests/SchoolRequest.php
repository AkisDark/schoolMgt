<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SchoolRequest extends FormRequest
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
            'schoolName' => 'required',
            'email' => 'required|email',
            'wilaya' =>'required|numeric',
            'dairas' => 'required|numeric',
            'fixedPhone' => 'sometimes|digits_between:8,10',
            'fax' => 'sometimes|digits_between:8,10'
        ];
    }
}
