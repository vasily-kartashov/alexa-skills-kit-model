<?php

namespace Alexa\Model\Dialog;

use Alexa\Model\Directive;
use Alexa\Model\Intent;
use \JsonSerializable;

final class ElicitSlotDirective extends Directive implements JsonSerializable
{
    const TYPE = 'Dialog.ElicitSlot';

    /** @var Intent|null */
    private $updatedIntent = null;

    /** @var string|null */
    private $slotToElicit = null;

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
    public function slotToElicit()
    {
        return $this->slotToElicit;
    }

    public static function builder(): ElicitSlotDirectiveBuilder
    {
        $instance = new self;
        $constructor = function ($updatedIntent, $slotToElicit) use ($instance): ElicitSlotDirective {
            $instance->updatedIntent = $updatedIntent;
            $instance->slotToElicit = $slotToElicit;
            return $instance;
        };
        return new class($constructor) extends ElicitSlotDirectiveBuilder
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
        $instance->slotToElicit = isset($data['slotToElicit']) ? ((string) $data['slotToElicit']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => self::TYPE,
            'updatedIntent' => $this->updatedIntent,
            'slotToElicit' => $this->slotToElicit
        ]);
    }
}
