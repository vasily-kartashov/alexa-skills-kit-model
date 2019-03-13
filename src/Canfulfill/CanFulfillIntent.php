<?php

namespace Alexa\Model\Canfulfill;

use \JsonSerializable;

final class CanFulfillIntent implements JsonSerializable
{
    /** @var CanFulfillIntentValues|null */
    private $canFulfill = null;

    /** @var CanFulfillSlot[] */
    private $slots = [];

    protected function __construct()
    {
    }

    /**
     * @return CanFulfillIntentValues|null
     */
    public function canFulfill()
    {
        return $this->canFulfill;
    }

    /**
     * @return CanFulfillSlot[]
     */
    public function slots()
    {
        return $this->slots;
    }

    public static function builder(): CanFulfillIntentBuilder
    {
        $instance = new self();
        $constructor = function ($canFulfill, $slots) use ($instance): CanFulfillIntent {
            $instance->canFulfill = $canFulfill;
            $instance->slots = $slots;
            return $instance;
        };
        return new class($constructor) extends CanFulfillIntentBuilder
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
        $instance->canFulfill = isset($data['canFulfill']) ? CanFulfillIntentValues::fromValue($data['canFulfill']) : null;
        $instance->slots = [];
        foreach ($data['slots'] as $item) {
            $element = isset($item) ? CanFulfillSlot::fromValue($item) : null;
            if ($element !== null) {
                $instance->slots[] = $element;
            }
        }
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'canFulfill' => $this->canFulfill,
            'slots' => $this->slots
        ]);
    }
}
