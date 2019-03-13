<?php

namespace Alexa\Model\SLU\EntityResolution;

use \JsonSerializable;

final class Resolution implements JsonSerializable
{
    /** @var string|null */
    private $authority = null;

    /** @var Status|null */
    private $status = null;

    /** @var ValueWrapper[] */
    private $values = [];

    protected function __construct()
    {
    }

    /**
     * @return string|null
     */
    public function authority()
    {
        return $this->authority;
    }

    /**
     * @return Status|null
     */
    public function status()
    {
        return $this->status;
    }

    /**
     * @return ValueWrapper[]
     */
    public function values()
    {
        return $this->values;
    }

    public static function builder(): ResolutionBuilder
    {
        $instance = new self();
        $constructor = function ($authority, $status, $values) use ($instance): Resolution {
            $instance->authority = $authority;
            $instance->status = $status;
            $instance->values = $values;
            return $instance;
        };
        return new class($constructor) extends ResolutionBuilder
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
        $instance->authority = isset($data['authority']) ? ((string) $data['authority']) : null;
        $instance->status = isset($data['status']) ? Status::fromValue($data['status']) : null;
        $instance->values = [];
        if (isset($data['values'])) {
            foreach ($data['values'] as $item) {
                $element = isset($item) ? ValueWrapper::fromValue($item) : null;
                if ($element !== null) {
                    $instance->values[] = $element;
                }
            }
        }
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'authority' => $this->authority,
            'status' => $this->status,
            'values' => $this->values
        ]);
    }
}
