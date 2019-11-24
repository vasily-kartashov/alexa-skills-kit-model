<?php

namespace Alexa\Model\Dialog;

use Alexa\Model\Directive;
use Alexa\Model\Intent;
use JsonSerializable;

final class DelegateDirective extends Directive implements JsonSerializable
{
    const TYPE = 'Dialog.Delegate';

    /** @var Intent|null */
    private $updatedIntent = null;

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

    public static function builder(): DelegateDirectiveBuilder
    {
        $instance = new self;
        return new class($constructor = function ($updatedIntent) use ($instance): DelegateDirective {
            $instance->updatedIntent = $updatedIntent;
            return $instance;
        }) extends DelegateDirectiveBuilder {};
    }

    /**
     * @param Intent $updatedIntent
     * @return self
     */
    public static function ofUpdatedIntent(Intent $updatedIntent): DelegateDirective
    {
        $instance = new self;
        $instance->updatedIntent = $updatedIntent;
        return $instance;
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
