<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestStoreRequest extends FormRequest
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
     *'title',
    'content',
    'violation_sphere_id',
    'violation_type_id',
    'violation_subj',
    'violator',
    'place',
    'place_code',
    'place_address',
    'violation_time',
    'region_id',
    'district_id',
    'settlement_id'
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:32',
            'content' => 'required|string|max:300',
            'violation_sphere_id' => 'required|integer',
            'violation_type_id' => 'required|integer',
            'violation_subj' => 'required|string|max:64',
            'violator' => 'required|string|max:64',
            'place' => 'required|string|max:64',
            'place_code' => 'integer',
            'place_address' => 'required|string|max:64',
            'violation_time' => 'required|date_format:Y-m-d H:i:s',
            'region_id' => 'required|integer',
            'district_id' => 'required|integer',
            'settlement_id' => 'required|integer',
            'photocopy.*' => "mimes:jpg,png,jpeg|max:20000",
            'audio.*' => "mimes:mp3,mpga,wav|max:20000",
            'video.*' => "mimes:mp4,mov,ogg,qt|max:20000",
            'reg_photocopy.*' => "mimes:jpg,png,jpeg|max:20000",
        ];
    }
}
