<?php

namespace Alexa\Model\Interfaces\GameEngine;

use Alexa\Model\Directive;
use \JsonSerializable;

final class StopInputHandlerDirective extends Directive implements JsonSerializable
{
    const TYPE = 'GameEngine.StopInputHandler';

    /** @var string|null */
    private $originatingRequestId = null;

    protected function __construct()
    {
        parent::__construct();
        $this->type = self::TYPE;
    }

    /**
     * @return string|null
     */
    public function originatingRequestId()
    {
        return $this->originatingRequestId;
    }

    public static function builder(): StopInputHandlerDirectiveBuilder
    {
        $instance = new self;
        $constructor = function ($originatingRequestId) use ($instance): StopInputHandlerDirective {
            $instance->originatingRequestId = $originatingRequestId;
            return $instance;
        };
        return new class($constructor) extends StopInputHandlerDirectiveBuilder
        {
            public function __construct(callable $constructor)
            {
                parent::__construct($constructor);
            }
        };
    }

    /**
     * @param string $originatingRequestId
     * @return self
     */
    public static function ofOriginatingRequestId(string $originatingRequestId): StopInputHandlerDirective
    {
        $instance = new self;
        $instance->originatingRequestId = $originatingRequestId;
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
        $instance->originatingRequestId = isset($data['originatingRequestId']) ? ((string) $data['originatingRequestId']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => self::TYPE,
            'originatingRequestId' => $this->originatingRequestId
        ]);
    }
}
