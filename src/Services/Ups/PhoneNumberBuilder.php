<?php

namespace Alexa\Model\Services\Ups;

abstract class PhoneNumberBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $countryCode = null;

    /** @var string|null */
    private $phoneNumber = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    public function withCountryCode(string $countryCode): self
    {
        $this->countryCode = $countryCode;
        return $this;
    }

    public function withPhoneNumber(string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;
        return $this;
    }

    public function build(): PhoneNumber
    {
        return ($this->constructor)(
            $this->countryCode,
            $this->phoneNumber
        );
    }
}
