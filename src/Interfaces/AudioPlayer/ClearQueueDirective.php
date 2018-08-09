<?php

namespace Alexa\Model\Interfaces\AudioPlayer;

use Alexa\Model\Directive;
use \JsonSerializable;

final class ClearQueueDirective extends Directive implements JsonSerializable
{
    const TYPE = 'AudioPlayer.ClearQueue';

    /** @var ClearBehavior|null */
    private $clearBehavior = null;

    protected function __construct()
    {
        parent::__construct();
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
        $instance = new self();
        $constructor = function ($clearBehavior) use ($instance): ClearQueueDirective {
            $instance->clearBehavior = $clearBehavior;
            return $instance;
        };
        return new class($constructor) extends ClearQueueDirectiveBuilder
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
