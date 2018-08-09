<?php

namespace Alexa\Model\Interfaces\GameEngine;

use Alexa\Model\Directive;
use Alexa\Model\Services\GameEngine\Event;
use Alexa\Model\Services\GameEngine\Recognizer;

abstract class StartInputHandlerDirectiveBuilder
{
    /** @var callable */
    private $constructor;

    /** @var int|null */
    private $timeout = null;

    /** @var string[] */
    private $proxies = [];

    /** @var Recognizer[] */
    private $recognizers = [];

    /** @var Event[] */
    private $events = [];

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    public function withTimeout(int $timeout): self
    {
        $this->timeout = $timeout;
        return $this;
    }

    /**
     * @param string[] $proxies
     * @return self
     */
    public function withProxies(array $proxies): self
    {
        $this->proxies = $proxies;
        return $this;
    }

    /**
     * @param Recognizer[] $recognizers
     * @return self
     */
    public function withRecognizers(array $recognizers): self
    {
        $this->recognizers = $recognizers;
        return $this;
    }

    /**
     * @param Event[] $events
     * @return self
     */
    public function withEvents(array $events): self
    {
        $this->events = $events;
        return $this;
    }

    public function build(): StartInputHandlerDirective
    {
        return ($this->constructor)(
            $this->timeout,
            $this->proxies,
            $this->recognizers,
            $this->events
        );
    }
}
