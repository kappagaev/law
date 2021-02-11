<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegistrationConfirmRequest extends FormRequest
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
            'password' => 'required|string|confirmed|max:32',
            'postcode' => 'required|digits_between:1,6',
            'phone' => 'required|phone:UA'
        ];
    }
    public function messages()
    {
        return [
            'password' => 'Обов\'язково, паролі майть співпадати',
            'postcode' => 'Обов\'язково, поштоврий індекс до 6 цифр',
            'phone' => 'Обов\'язково, телефон українського формату'

        ];
    }
}
