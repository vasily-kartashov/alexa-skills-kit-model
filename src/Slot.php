<?php

namespace Alexa\Model;

use Alexa\Model\SLU\EntityResolution\Resolutions;
use JsonSerializable;

final class Slot implements JsonSerializable
{
    /** @var string|null */
    private $name = null;

    /** @var string|null */
    private $value = null;

    /** @var SlotConfirmationStatus|null */
    private $confirmationStatus = null;

    /** @var Resolutions|null */
    private $resolutions = null;

    protected function __construct()
    {
    }

    /**
     * @return string|null
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * @return string|null
     */
    public function value()
    {
        return $this->value;
    }

    /**
     * @return SlotConfirmationStatus|null
     */
    public function confirmationStatus()
    {
        return $this->confirmationStatus;
    }

    /**
     * @return Resolutions|null
     */
    public function resolutions()
    {
        return $this->resolutions;
    }

    public static function builder(): SlotBuilder
    {
        $instance = new self;
        return new class($constructor = function ($name, $value, $confirmationStatus, $resolutions) use ($instance): Slot {
            $instance->name = $name;
            $instance->value = $value;
            $instance->confirmationStatus = $confirmationStatus;
            $instance->resolutions = $resolutions;
            return $instance;
        }) extends SlotBuilder {};
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->name = isset($data['name']) ? ((string) $data['name']) : null;
        $instance->value = isset($data['value']) ? ((string) $data['value']) : null;
        $instance->confirmationStatus = isset($data['confirmationStatus']) ? SlotConfirmationStatus::fromValue($data['confirmationStatus']) : null;
        $instance->resolutions = isset($data['resolutions']) ? Resolutions::fromValue($data['resolutions']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'name' => $this->name,
            'value' => $this->value,
            'confirmationStatus' => $this->confirmationStatus,
            'resolutions' => $this->resolutions
        ]);
    }
}
