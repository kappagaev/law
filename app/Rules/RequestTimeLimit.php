<?php

namespace App\Rules;

use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;

class RequestTimeLimit implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $timestamp = Carbon::parse($value);
        $sub6 = Carbon::now()->subMonths(6);

        return $timestamp > $sub6;

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return  'Скаргу можна подати лише протягом 6 місяців з дня виявлення порушення' ;
    }
}
