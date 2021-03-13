<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest
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
            'postcode' => 'required|digits_between:1,6',
            'phone' => 'required|phone:UA',
            'territory_id' => 'required|integer',
            'street' => 'required|string|min:1|max:32',
            'house' => 'required|integer|min:1',
            'flat' => 'integer|nullable|min:1',
        ];
    }

    public function messages()
    {
        return [
            'phone' => 'Телефон обов\'язковий та має бути українського формату',
        ];
    }
}
