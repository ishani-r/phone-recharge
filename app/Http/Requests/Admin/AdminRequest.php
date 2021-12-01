<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
            'name' => 'required',
            'email' =>  'required|string|email|max:255|regex:/(.+)@(.+)\.(.+)/i|unique:admins',
            'password' => 'required|min:8|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*#?&]/',
            'image' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Please Enter Your Name.',
            'email.required' => 'Please Enter Your Email Address.',
            'password.required' => 'Please Enter Your Password.',
            'image.required' => 'Please Select Your Profile Picture.',
        ];
    }
}
