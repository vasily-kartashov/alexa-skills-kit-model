<?php

namespace Alexa\Model\Interfaces\Display;

use Alexa\Model\Request;

abstract class ElementSelectedRequestBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $token = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

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
