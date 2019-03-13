<?php

namespace Alexa\Model\Interfaces\AmazonPay\Response;

abstract class AmazonPayErrorResponseBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $errorCode = null;

    /** @var string|null */
    private $errorMessage = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    public function withErrorCode(string $errorCode): self
    {
        $this->errorCode = $errorCode;
        return $this;
    }

    public function withErrorMessage(string $errorMessage): self
    {
        $this->errorMessage = $errorMessage;
        return $this;
    }

    public function build(): AmazonPayErrorResponse
    {
        return ($this->constructor)(
            $this->errorCode,
            $this->errorMessage
        );
    }
}
