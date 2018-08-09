<?php

namespace Alexa\Model;

use \JsonSerializable;

final class Intent implements JsonSerializable
{
    /** @var string|null */
    private $name = null;

    /** @var Slot[] */
    private $slots = [];

    /** @var IntentConfirmationStatus|null */
    private $confirmationStatus = null;

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
     * @return Slot[]
     */
    public function slots()
    {
        return $this->slots;
    }

    /**
     * @return IntentConfirmationStatus|null
     */
    public function confirmationStatus()
    {
        return $this->confirmationStatus;
    }

    public static function builder(): IntentBuilder
    {
        $instance = new self();
        $constructor = function ($name, $slots, $confirmationStatus) use ($instance): Intent {
            $instance->name = $name;
            $instance->slots = $slots;
            $instance->confirmationStatus = $confirmationStatus;
            return $instance;
        };
        return new class($constructor) extends IntentBuilder
        {
            public function __construct(callable $constructor)
            {
                parent::__construct($constructor);
            }
        };
    }

    public static function fromValue(array $data)
    {
        $instance = new self();
        $instance->name = isset($data['name']) ? ((string) $data['name']) : null;
        $instance->slots = [];
        foreach ($data['slots'] as $item) {
            $element = isset($item) ? Slot::fromValue($item) : null;
            if ($element) {
                $instance->slots[] = $element;
            }
        }
        $instance->confirmationStatus = isset($data['confirmationStatus']) ? IntentConfirmationStatus::fromValue($data['confirmationStatus']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'name' => $this->name,
            'slots' => $this->slots,
            'confirmationStatus' => $this->confirmationStatus
        ]);
    }
}