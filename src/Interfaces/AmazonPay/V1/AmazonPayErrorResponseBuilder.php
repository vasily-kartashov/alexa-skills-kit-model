<?php

namespace Alexa\Model\Interfaces\AmazonPay\V1;

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

    /**
     * @param string $errorCode
     * @return self
     */
    public function withErrorCode(string $errorCode): self
    {
        $this->errorCode = $errorCode;
        return $this;
    }

    /**
     * @param string $errorMessage
     * @return self
     */
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
