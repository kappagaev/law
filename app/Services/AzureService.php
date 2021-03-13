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
        $azure->surname = $names[0];
        $azure->name = $names[1];
        $azure->patronymic = $names[2];
        $azure->save();
        return $azure;
    }

    public function getRegistration($data)
    {
        $registration = AzureRegistration::where($data)->first();

        return $registration ?: $this->createRegistration($data);
    }

}
