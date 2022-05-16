<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CheckPhoneVerificationCode implements Rule
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
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return auth()->user()->phone_verification_code == $value;

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('users.wrong_phone_verification_code');
    }
}
