<?php

namespace Alexa\Model;

abstract class PermissionsBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $consentToken = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    public function withConsentToken(string $consentToken): self
    {
        $this->consentToken = $consentToken;
        return $this;
    }

    public function build(): Permissions
    {
        return ($this->constructor)(
            $this->consentToken
        );
    }
}
