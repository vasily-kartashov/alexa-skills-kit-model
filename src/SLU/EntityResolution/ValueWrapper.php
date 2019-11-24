<?php

namespace Alexa\Model\SLU\EntityResolution;

use JsonSerializable;

final class ValueWrapper implements JsonSerializable
{
    /** @var Value|null */
    private $value = null;

    protected function __construct()
    {
    }

    /**
     * @return Value|null
     */
    public function value()
    {
        return $this->value;
    }

    public static function builder(): ValueWrapperBuilder
    {
        $instance = new self;
        return new class($constructor = function ($value) use ($instance): ValueWrapper {
            $instance->value = $value;
            return $instance;
        }) extends ValueWrapperBuilder {};
    }

    /**
     * @param Value $value
     * @return self
     */
    public static function ofValue(Value $value): ValueWrapper
    {
        $instance = new self;
        $instance->value = $value;
        return $instance;
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->value = isset($data['value']) ? Value::fromValue($data['value']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'value' => $this->value
        ]);
    }
}
