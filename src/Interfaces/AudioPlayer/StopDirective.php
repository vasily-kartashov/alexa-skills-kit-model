<?php

namespace Alexa\Model\Interfaces\AudioPlayer;

use Alexa\Model\Directive;
use \JsonSerializable;

final class StopDirective extends Directive implements JsonSerializable
{
    const TYPE = 'AudioPlayer.Stop';

    protected function __construct()
    {
        parent::__construct();
        $this->type = self::TYPE;
    }

    public static function builder(): StopDirectiveBuilder
    {
        $instance = new self();
        $constructor = function () use ($instance): StopDirective {
            return $instance;
        };
        return new class($constructor) extends StopDirectiveBuilder
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
        $instance->type = self::TYPE;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => self::TYPE
        ]);
    }
}
