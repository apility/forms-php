<?php

namespace Apility\Forms\Rules;

use Illuminate\Contracts\Validation\Rule;

class PhoneNumber implements Rule
{
    protected bool $countryCodeOptional = false;

    public function __construct(bool $requireCountryCode = false)
    {
        $this->countryCodeOptional = !$requireCountryCode;
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
        return preg_match('/^(?:(?:\+|00)(?:[0-9]{1,3})' . ($this->countryCodeOptional ? '?' : null) . '(?: +)?)?[0-9(\)\. -]+[0-9]$/', $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Invalid phone number.';
    }
}
