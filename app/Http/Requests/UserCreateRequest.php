<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
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
            'name' => 'required|string|max:32',
            'surname' => 'required|string|max:32',
            'patronymic' => 'string|max:32',
            'postcode' => 'required|digits_between:1,20',
            'phone' => 'required|string|max:32',
            'territory_id' => 'required|integer',
            'address' => 'required|string|max:32',
            'role_id' => 'required|integer|max:32',
            'email' => 'unique:users|email|',
        ];
    }
}
