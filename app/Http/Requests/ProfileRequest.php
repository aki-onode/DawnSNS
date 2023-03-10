<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'mail' => 'required|string|email',
            'password' => 'alpha_num|between:4,12|different:password|nullable',
            'bio' => 'max:200|nullable',
            'image' => 'file|mimes:jpg,png,bmp,gif,svg|nullable',
        ];
    }

    public function messages()
    {
        return [
            //
        ];
    }
}
