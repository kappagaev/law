<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistraionNotificationRequest extends FormRequest
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
            'patronymic' => 'string|max:32|nullable',
            'territory_id' => 'required|integer',
        ];
    }
}
