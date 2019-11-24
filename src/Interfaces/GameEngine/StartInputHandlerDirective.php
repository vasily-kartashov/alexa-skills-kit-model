<?php

namespace Alexa\Model\Interfaces\GameEngine;

use Alexa\Model\Directive;
use Alexa\Model\Services\GameEngine\Event;
use Alexa\Model\Services\GameEngine\Recognizer;
use JsonSerializable;

final class StartInputHandlerDirective extends Directive implements JsonSerializable
{
    const TYPE = 'GameEngine.StartInputHandler';

    /** @var int|null */
    private $timeout = null;

    /** @var string[] */
    private $proxies = [];

    /** @var Recognizer[] */
    private $recognizers = [];

    /** @var Event[] */
    private $events = [];

    protected function __construct()
    {
        parent::__construct();
        $this->type = self::TYPE;
    }

    /**
     * @return int|null
     */
    public function timeout()
    {
        return $this->timeout;
    }

    /**
     * @return string[]
     */
    public function proxies()
    {
        return $this->proxies;
    }

    /**
     * @return Recognizer[]
     */
    public function recognizers()
    {
        return $this->recognizers;
    }

    /**
     * @return Event[]
     */
    public function events()
    {
        return $this->events;
    }

    public static function builder(): StartInputHandlerDirectiveBuilder
    {
        $instance = new self;
        return new class($constructor = function ($timeout, $proxies, $recognizers, $events) use ($instance): StartInputHandlerDirective {
            $instance->timeout = $timeout;
            $instance->proxies = $proxies;
            $instance->recognizers = $recognizers;
            $instance->events = $events;
            return $instance;
        }) extends StartInputHandlerDirectiveBuilder {};
    }

    /**
     * @param int $timeout
     * @return self
     */
    public static function ofTimeout(int $timeout): StartInputHandlerDirective
    {
        $instance = new self;
        $instance->timeout = $timeout;
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
        $instance->timeout = isset($data['timeout']) ? ((int) $data['timeout']) : null;
        $instance->proxies = [];
        if (isset($data['proxies'])) {
            foreach ($data['proxies'] as $item) {
                $element = isset($item) ? ((string) $item) : null;
                if ($element !== null) {
                    $instance->proxies[] = $element;
                }
            }
        }
        $instance->recognizers = [];
        if (isset($data['recognizers'])) {
            foreach ($data['recognizers'] as $item) {
                $element = isset($item) ? Recognizer::fromValue($item) : null;
                if ($element !== null) {
                    $instance->recognizers[] = $element;
                }
            }
        }
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
            'timeout' => $this->timeout,
            'proxies' => $this->proxies,
            'recognizers' => $this->recognizers,
            'events' => $this->events
        ]);
    }
}
