<?php

namespace Alexa\Model\Dialog;

use Alexa\Model\Directive;
use Alexa\Model\Intent;
use \JsonSerializable;

final class ConfirmSlotDirective extends Directive implements JsonSerializable
{
    const TYPE = 'Dialog.ConfirmSlot';

    /** @var Intent|null */
    private $updatedIntent = null;

    /** @var string|null */
    private $slotToConfirm = null;

    protected function __construct()
    {
        parent::__construct();
        $this->type = self::TYPE;
    }

    /**
     * @return Intent|null
     */
    public function updatedIntent()
    {
        return $this->updatedIntent;
    }

    /**
     * @return string|null
     */
    public function slotToConfirm()
    {
        return $this->slotToConfirm;
    }

    public static function builder(): ConfirmSlotDirectiveBuilder
    {
        $instance = new self;
        $constructor = function ($updatedIntent, $slotToConfirm) use ($instance): ConfirmSlotDirective {
            $instance->updatedIntent = $updatedIntent;
            $instance->slotToConfirm = $slotToConfirm;
            return $instance;
        };
        return new class($constructor) extends ConfirmSlotDirectiveBuilder
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
        $instance = new self;
        $instance->type = self::TYPE;
        $instance->updatedIntent = isset($data['updatedIntent']) ? Intent::fromValue($data['updatedIntent']) : null;
        $instance->slotToConfirm = isset($data['slotToConfirm']) ? ((string) $data['slotToConfirm']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => self::TYPE,
            'updatedIntent' => $this->updatedIntent,
            'slotToConfirm' => $this->slotToConfirm
        ]);
    }
}
