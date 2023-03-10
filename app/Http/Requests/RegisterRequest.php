<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'username' => 'required|string|between:4,12',
            'mail' => 'required|string|email|min:4|unique:users',
            'password' => 'required|alpha_num|between:4,12|confirmed',
            'password_confirmation' => 'required',
        ];
    }
}
