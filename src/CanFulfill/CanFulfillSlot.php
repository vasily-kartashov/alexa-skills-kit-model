<?php

namespace Alexa\Model\CanFulfill;

use JsonSerializable;

final class CanFulfillSlot implements JsonSerializable
{
    /** @var CanUnderstandSlotValues|null */
    private $canUnderstand = null;

    /** @var CanFulfillSlotValues|null */
    private $canFulfill = null;

    protected function __construct()
    {
    }

    /**
     * @return CanUnderstandSlotValues|null
     */
    public function canUnderstand()
    {
        return $this->canUnderstand;
    }

    /**
     * @return CanFulfillSlotValues|null
     */
    public function canFulfill()
    {
        return $this->canFulfill;
    }

    public static function builder(): CanFulfillSlotBuilder
    {
        $instance = new self;
        return new class($constructor = function ($canUnderstand, $canFulfill) use ($instance): CanFulfillSlot {
            $instance->canUnderstand = $canUnderstand;
            $instance->canFulfill = $canFulfill;
            return $instance;
        }) extends CanFulfillSlotBuilder {};
    }

    /**
     * @param CanUnderstandSlotValues $canUnderstand
     * @return self
     */
    public static function ofCanUnderstand(CanUnderstandSlotValues $canUnderstand): CanFulfillSlot
    {
        $instance = new self;
        $instance->canUnderstand = $canUnderstand;
        return $instance;
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->canUnderstand = isset($data['canUnderstand']) ? CanUnderstandSlotValues::fromValue($data['canUnderstand']) : null;
        $instance->canFulfill = isset($data['canFulfill']) ? CanFulfillSlotValues::fromValue($data['canFulfill']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'canUnderstand' => $this->canUnderstand,
            'canFulfill' => $this->canFulfill
        ]);
    }
}
