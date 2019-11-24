<?php

namespace Alexa\Model\Interfaces\AmazonPay\Model\Request;

use \JsonSerializable;

final class PaymentAction implements JsonSerializable
{
    /** @var string */
    private $value;

    private static function instances(): array
    {
        static $instances;
        if (!$instances) {
            $instances = [
                'Authorize' => new static('Authorize'),
                'AuthorizeAndCapture' => new static('AuthorizeAndCapture'),
                'null' => new static('null')
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
        return static::instances()['Authorize'];
    }

    public static function AUTHORIZE_AND_CAPTURE(): self
    {
        return static::instances()['AuthorizeAndCapture'];
    }

    public static function NULL(): self
    {
        return static::instances()['null'];
    }

    /**
     * @param string $text
     * @return self|null
     */
    public static function fromValue(string $text)
    {
        return static::instances()[$text] ?? null;
    }

    /**
     * @return self[]
     */
    public static function values()
    {
        return static::instances();
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
