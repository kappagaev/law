<?php

namespace App\Rules;

use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;

class LawApproveTimecheck implements Rule
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
        $lawApproved = Carbon::create(2021, 1, 16);

        return $timestamp > $lawApproved;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Закон про мову вступив в дію лише 16 січня 2021 року, тому ми не можемо прийняти вашу скаргу на подію, що трапилась до цього часу';
    }
}
