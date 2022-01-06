<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'username' => ['required'],
            'phone' => ['required', 'digits:10'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed', 'min:5', 'max:200'],
            'password_confirmation' => ['required', 'min:5', 'max:200'],
        ];
    }
}
