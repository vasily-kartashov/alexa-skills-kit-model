<?php

namespace Alexa\Model\Interfaces\AmazonPay\Model\V1;

use JsonSerializable;

final class PaymentAction implements JsonSerializable
{
    /** @var string */
    private $value;

    public static function values(): array
    {
        static $instances;
        if (!isset($instances)) {
            $instances = [
                'Authorize'           => new static('Authorize'),
                'AuthorizeAndCapture' => new static('AuthorizeAndCapture')
            ];
        }
        return $instances;
    }

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function AUTHORIZE(): self
    {
        return static::values()['Authorize'];
    }

    public static function AUTHORIZE_AND_CAPTURE(): self
    {
        return static::values()['AuthorizeAndCapture'];
    }

    /**
     * @param string $text
     * @return self|null
     */
    public static function fromValue(string $text)
    {
        return static::values()[$text] ?? null;
    }

    public function __toString(): string
    {
        return $this->value;
    }

    public function jsonSerialize(): string
    {
        return $this->value;
    }
}
