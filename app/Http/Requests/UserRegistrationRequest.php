<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegistrationRequest extends FormRequest
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
            'name' => 'required|string|max:32',
            'surname' => 'required|string|max:32',
            'email' => 'email|required',
            'patronymic' => 'string|max:32|nullable',
            'is_naukma' => 'in:1',
            'university_role_id' => 'required_if:is_naukma,1|integer|between:1,3',
            'kmamail' => 'required_if:is_naukma,1|email|regex:/(.*)ukma\.edu\.ua$/i|nullable',
            'territory_id' => 'required|integer',

        ];
    }
}
