<?php

namespace Alexa\Model\Interfaces\CustomInterfaceController;

use Alexa\Model\Directive;
use \JsonSerializable;

final class StopEventHandlerDirective extends Directive implements JsonSerializable
{
    const TYPE = 'CustomInterfaceController.StopEventHandler';

    /** @var string|null */
    private $token = null;

    protected function __construct()
    {
        parent::__construct();
        $this->type = self::TYPE;
    }

    /**
     * @return string|null
     */
    public function token()
    {
        return $this->token;
    }

    public static function builder(): StopEventHandlerDirectiveBuilder
    {
        $instance = new self;
        $constructor = function ($token) use ($instance): StopEventHandlerDirective {
            $instance->token = $token;
            return $instance;
        };
        return new class($constructor) extends StopEventHandlerDirectiveBuilder
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
        $instance->token = isset($data['token']) ? ((string) $data['token']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => self::TYPE,
            'token' => $this->token
        ]);
    }
}
