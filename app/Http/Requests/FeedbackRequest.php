<?php

namespace App\Http\Requests;

use App\Rules\Ukrainian;
use Illuminate\Foundation\Http\FormRequest;

class FeedbackRequest extends FormRequest
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
            'name' => ['required','string','max:255', new Ukrainian()],
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:255'
        ];
    }
}
