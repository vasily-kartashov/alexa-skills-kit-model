<?php

namespace Alexa\Model;

abstract class PermissionsBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $consentToken = null;

    /** @var Scope[] */
    private $scopes = [];

    public function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param string $consentToken
     * @return self
     */
    public function withConsentToken(string $consentToken): self
    {
        $this->consentToken = $consentToken;
        return $this;
    }

    /**
     * @param array $scopes
     * @return self
     */
    public function withScopes(array $scopes): self
    {
        foreach ($scopes as $element) {
            assert($element instanceof Scope);
        }
        $this->scopes = $scopes;
        return $this;
    }

    public function build(): Permissions
    {
        return ($this->constructor)(
            $this->consentToken,
            $this->scopes
        );
    }
}
