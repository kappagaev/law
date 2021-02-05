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
            'phone' => 'required|phone:UA',
            'territory_id' => 'required|integer',
            'role_id' => 'required|integer|max:32',
            'email' => 'unique:users|email|',
            'street' => 'required|string|max:32',
            'house' => 'required|integer',
            'flat' => 'integer',
            'is_naukma' => 'in:1',
            'university_role_id' => 'required_if:is_naukma,1|integer|between:1,3',
            'kmamail' => 'required_if:is_naukma,1|email|regex:/(.*)ukma\.edu\.ua$/i|nullable',

        ];
    }
}
