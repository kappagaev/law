<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Ukrainian implements Rule
{
    protected $key = 'uk';
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
        return (bool) preg_match('[а-їґЄ-ЯҐ]', $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Поле :attribute повенне бути написане українською мовою.';
    }
}
