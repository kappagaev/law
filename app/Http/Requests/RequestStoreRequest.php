<?php

namespace App\Http\Requests;

use App\Rules\LawApproveTimecheck;
use App\Rules\LawAproveTimechack;
use App\Rules\RequestTimeLimit;
use App\Rules\TimestampBeforeNow;
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
            'violation_time' => ['required', 'date_format:Y-m-d H:i:s', new TimestampBeforeNow(), new RequestTimeLimit(), new LawApproveTimecheck()],
            'territory_id' => 'required|integer',
            'filesFields' => 'required_without_all:audio,video,reg_photocopy,witness_reg_photo,photocopy',
            'photocopy' => 'array',
            'audio' => 'array',
            'video' => 'array',
            'reg_photocopy' => 'array',
            'witness_reg_photo' => 'array',
            'photocopy.*' => "mimes:jpg,png,jpeg|max:20000",
            'audio.*' => "mimes:mp3,mpga,wav|max:20000",
            'video.*' => "mimes:mp4,mov,ogg,qt|max:100000",
            'reg_photocopy.*' => "mimes:jpg,png,jpeg|max:20000",
            'witness_reg_photo.*' => "mimes:jpg,png,jpeg|max:20000",
//            'photocopy.*' => "required|max:20000",
//            'audio.*' => "required|max:20000",
//            'video.*' => "required|max:100000",
//            'reg_photocopy.*' => "required|max:20000",
//            'witness_reg_photo.*' => "required|max:20000",
            'show_content' => 'min:1|max:1|nullable'
        ];
    }

    public function attributes()
    {
        return [
            'territory_id' => 'Місто/Село',
            'filesFields' => 'з файлами',
            'photocopy' => 'Фотокопія документа',
            'audio' => 'Аудіозапис',
            'video' => 'Відеозапис',
            'reg_photocopy' => 'Фотокопія установчих та реєстраційних документів',
            'witness_reg_photo' => 'Фотокопія акта, підписаного свідками'
        ];
    }

    public function messages()
    {
        return [
            'filesFields' => 'До скарги має бути прикріплене хоча б одне медіа-підтвердження'
        ];
    }

}
