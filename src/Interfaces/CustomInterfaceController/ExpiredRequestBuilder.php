<?php

namespace Alexa\Model\Interfaces\CustomInterfaceController;

abstract class ExpiredRequestBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $token = null;

    /** @var mixed|null */
    private $expirationPayload = null;

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

    /**
     * @param mixed $expirationPayload
     * @return self
     */
    public function withExpirationPayload($expirationPayload): self
    {
        $this->expirationPayload = $expirationPayload;
        return $this;
    }

    public function build(): ExpiredRequest
    {
        return ($this->constructor)(
            $this->token,
            $this->expirationPayload
        );
    }
}
