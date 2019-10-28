<?php

namespace Alexa\Model\Interfaces\CustomInterfaceController;

use Alexa\Model\Directive;
use \JsonSerializable;

final class StartEventHandlerDirective extends Directive implements JsonSerializable
{
    const TYPE = 'CustomInterfaceController.StartEventHandler';

    /** @var string|null */
    private $token = null;

    /** @var EventFilter|null */
    private $eventFilter = null;

    /** @var Expiration|null */
    private $expiration = null;

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

    /**
     * @return EventFilter|null
     */
    public function eventFilter()
    {
        return $this->eventFilter;
    }

    /**
     * @return Expiration|null
     */
    public function expiration()
    {
        return $this->expiration;
    }

    public static function builder(): StartEventHandlerDirectiveBuilder
    {
        $instance = new self();
        $constructor = function ($token, $eventFilter, $expiration) use ($instance): StartEventHandlerDirective {
            $instance->token = $token;
            $instance->eventFilter = $eventFilter;
            $instance->expiration = $expiration;
            return $instance;
        };
        return new class($constructor) extends StartEventHandlerDirectiveBuilder
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
        $instance->token = isset($data['token']) ? ((string) $data['token']) : null;
        $instance->eventFilter = isset($data['eventFilter']) ? EventFilter::fromValue($data['eventFilter']) : null;
        $instance->expiration = isset($data['expiration']) ? Expiration::fromValue($data['expiration']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => self::TYPE,
            'token' => $this->token,
            'eventFilter' => $this->eventFilter,
            'expiration' => $this->expiration
        ]);
    }
}
