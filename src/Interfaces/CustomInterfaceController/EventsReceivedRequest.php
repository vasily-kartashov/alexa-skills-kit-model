<?php

namespace Alexa\Model\Interfaces\CustomInterfaceController;

use Alexa\Model\Request;
use \JsonSerializable;

final class EventsReceivedRequest extends Request implements JsonSerializable
{
    const TYPE = 'CustomInterfaceController.EventsReceived';

    /** @var string|null */
    private $token = null;

    /** @var Event[] */
    private $events = [];

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
     * @return Event[]
     */
    public function events()
    {
        return $this->events;
    }

    public static function builder(): EventsReceivedRequestBuilder
    {
        $instance = new self();
        $constructor = function ($token, $events) use ($instance): EventsReceivedRequest {
            $instance->token = $token;
            $instance->events = $events;
            return $instance;
        };
        return new class($constructor) extends EventsReceivedRequestBuilder
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
        $instance->events = [];
        if (isset($data['events'])) {
            foreach ($data['events'] as $item) {
                $element = isset($item) ? Event::fromValue($item) : null;
                if ($element !== null) {
                    $instance->events[] = $element;
                }
            }
        }
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => self::TYPE,
            'token' => $this->token,
            'events' => $this->events
        ]);
    }
}
