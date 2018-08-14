<?php

namespace Alexa\Model\Interfaces\AmazonPay\V1;

use \JsonSerializable;

final class AmazonPayErrorResponse implements JsonSerializable
{
    /** @var string|null */
    private $errorCode = null;

    /** @var string|null */
    private $errorMessage = null;

    protected function __construct()
    {
    }

    /**
     * @return string|null
     */
    public function errorCode()
    {
        return $this->errorCode;
    }

    /**
     * @return string|null
     */
    public function errorMessage()
    {
        return $this->errorMessage;
    }

    public static function builder(): AmazonPayErrorResponseBuilder
    {
        $instance = new self();
        $constructor = function ($errorCode, $errorMessage) use ($instance): AmazonPayErrorResponse {
            $instance->errorCode = $errorCode;
            $instance->errorMessage = $errorMessage;
            return $instance;
        };
        return new class($constructor) extends AmazonPayErrorResponseBuilder
        {
            public function __construct(callable $constructor)
            {
                parent::__construct($constructor);
            }
        };
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self();
        $instance->errorCode = isset($data['errorCode']) ? ((string) $data['errorCode']) : null;
        $instance->errorMessage = isset($data['errorMessage']) ? ((string) $data['errorMessage']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'errorCode' => $this->errorCode,
            'errorMessage' => $this->errorMessage
        ]);
    }
}
