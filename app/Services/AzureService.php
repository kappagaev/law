<?php


namespace App\Services;


use App\Models\AzureRegistration;
use Illuminate\Support\Str;

class AzureService
{
    public function createRegistration($data)
    {
        $azure = new AzureRegistration($data);
        $azure->key = Str::random(15);
        $names = explode(' ', $data['name']);
        $azure->surname = isset($names[0]) ? $names[0] : '';
        $azure->name = isset($names[1]) ? $names[1] : '';
        $azure->patronymic = isset($names[2]) ? $names[2] : '';
        $azure->save();
        return $azure;
    }

    public function getRegistration($data)
    {
        $registration = AzureRegistration::where($data)->first();

        return $registration ?: $this->createRegistration($data);
    }

}
