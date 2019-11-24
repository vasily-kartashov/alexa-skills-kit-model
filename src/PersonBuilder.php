<?php

namespace Alexa\Model;

abstract class PersonBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $personId = null;

    /** @var string|null */
    private $accessToken = null;

    public function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param string $personId
     * @return self
     */
    public function withPersonId(string $personId): self
    {
        $this->personId = $personId;
        return $this;
    }

    /**
     * @param string $accessToken
     * @return self
     */
    public function withAccessToken(string $accessToken): self
    {
        $this->accessToken = $accessToken;
        return $this;
    }

    public function build(): Person
    {
        return ($this->constructor)(
            $this->personId,
            $this->accessToken
        );
    }
}
