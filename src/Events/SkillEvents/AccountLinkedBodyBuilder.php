<?php

namespace Alexa\Model\Events\SkillEvents;

abstract class AccountLinkedBodyBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $accessToken = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param mixed $accessToken
     * @return self
     */
    public function withAccessToken(string $accessToken): self
    {
        $this->accessToken = $accessToken;
        return $this;
    }

    public function build(): AccountLinkedBody
    {
        return ($this->constructor)(
            $this->accessToken
        );
    }
}
