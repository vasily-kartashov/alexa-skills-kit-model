<?php

namespace Alexa\Model\Interfaces\Display;

abstract class ElementSelectedRequestBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $token = null;

    public function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param string $token
     * @return self
     */
    public function withToken(string $token): self
    {
        $this->token = $token;
        return $this;
    }

    public function build(): ElementSelectedRequest
    {
        return ($this->constructor)(
            $this->token
        );
    }
}
