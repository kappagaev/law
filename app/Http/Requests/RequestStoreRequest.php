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
            'content' => 'required|string|max:300',
            'violation_sphere_id' => 'required|integer',
            'violation_type_id' => 'required|integer',
            'violator' => 'nullable|string|max:64',
            'place' => 'required|string|max:64',
            'place_code' => 'digits_between:0,20',
            'place_address' => 'required|string|max:64',
            'violation_time' => 'required|date_format:Y-m-d H:i:s|before:tomorrow',
            'territory_id' => 'required|integer',
            'photocopy.*' => "required_without_all:audio,video,reg_photocopy,witness_reg_photo|mimes:jpg,png,jpeg|max:20000",
            'audio.*' => "required_without_all:photocopy,video,reg_photocopy,witness_reg_photo|mimes:mp3,mpga,wav|max:20000",
            'video.*' => "required_without_all:photocopy,audio,reg_photocopy,witness_reg_photo|mimes:mp4,mov,ogg,qt|max:100000",
            'reg_photocopy.*' => "required_without_all:photocopy,audio,video,witness_reg_photo|mimes:jpg,png,jpeg|max:20000",
            'witness_reg_photo.*' => "required_without_all:photocopy,audio,video,reg_photocopy|mimes:jpg,png,jpeg|max:20000",
//            'photocopy.*' => "required|max:20000",
//            'audio.*' => "required|max:20000",
//            'video.*' => "required|max:100000",
//            'reg_photocopy.*' => "required|max:20000",
//            'witness_reg_photo.*' => "required|max:20000",
            'show_content' => 'accepted'
        ];
    }

}
