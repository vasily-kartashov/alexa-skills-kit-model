<?php

namespace Alexa\Model\Interfaces\AudioPlayer;

use Alexa\Model\Directive;
use JsonSerializable;

final class ClearQueueDirective extends Directive implements JsonSerializable
{
    const TYPE = 'AudioPlayer.ClearQueue';

    /** @var ClearBehavior|null */
    private $clearBehavior = null;

    protected function __construct()
    {
        parent::__construct();
        $this->type = self::TYPE;
    }

    /**
     * @return ClearBehavior|null
     */
    public function clearBehavior()
    {
        return $this->clearBehavior;
    }

    public static function builder(): ClearQueueDirectiveBuilder
    {
        $instance = new self;
        return new class($constructor = function ($clearBehavior) use ($instance): ClearQueueDirective {
            $instance->clearBehavior = $clearBehavior;
            return $instance;
        }) extends ClearQueueDirectiveBuilder {};
    }

    /**
     * @param ClearBehavior $clearBehavior
     * @return self
     */
    public static function ofClearBehavior(ClearBehavior $clearBehavior): ClearQueueDirective
    {
        $instance = new self;
        $instance->clearBehavior = $clearBehavior;
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
        $instance->clearBehavior = isset($data['clearBehavior']) ? ClearBehavior::fromValue($data['clearBehavior']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => self::TYPE,
            'clearBehavior' => $this->clearBehavior
        ]);
    }
}
