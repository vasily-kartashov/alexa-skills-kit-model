<?php

namespace Alexa\Model\Dialog;

use Alexa\Model\Directive;
use Alexa\Model\Intent;
use \JsonSerializable;

final class ConfirmIntentDirective extends Directive implements JsonSerializable
{
    const TYPE = 'Dialog.ConfirmIntent';

    /** @var Intent|null */
    private $updatedIntent = null;

    protected function __construct()
    {
        parent::__construct();
    }

    /**
     * @return Intent|null
     */
    public function updatedIntent()
    {
        return $this->updatedIntent;
    }

    public static function builder(): ConfirmIntentDirectiveBuilder
    {
        $instance = new self();
        $constructor = function ($updatedIntent) use ($instance): ConfirmIntentDirective {
            $instance->updatedIntent = $updatedIntent;
            return $instance;
        };
        return new class($constructor) extends ConfirmIntentDirectiveBuilder
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
        $instance->type = self::TYPE;
        $instance->updatedIntent = isset($data['updatedIntent']) ? Intent::fromValue($data['updatedIntent']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => self::TYPE,
            'updatedIntent' => $this->updatedIntent
        ]);
    }
}
