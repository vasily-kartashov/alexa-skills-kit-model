<?php

namespace Alexa\Model\Interfaces\CustomInterfaceController;

abstract class ExpirationBuilder
{
    /** @var callable */
    private $constructor;

    /** @var int|null */
    private $durationInMilliseconds = null;

    /** @var mixed|null */
    private $expirationPayload = null;

    public function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param int $durationInMilliseconds
     * @return self
     */
    public function withDurationInMilliseconds(int $durationInMilliseconds): self
    {
        $this->durationInMilliseconds = $durationInMilliseconds;
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

    public function build(): Expiration
    {
        return ($this->constructor)(
            $this->durationInMilliseconds,
            $this->expirationPayload
        );
    }
}
