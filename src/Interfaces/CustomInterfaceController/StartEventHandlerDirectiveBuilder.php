<?php

namespace Alexa\Model\Interfaces\CustomInterfaceController;

abstract class StartEventHandlerDirectiveBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $token = null;

    /** @var EventFilter|null */
    private $eventFilter = null;

    /** @var Expiration|null */
    private $expiration = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param string $token
     * @return self
     */
    public function withToken(string $token): self
    {
        $this->token = $token;
        return $this;
    }

    /**
     * @param EventFilter $eventFilter
     * @return self
     */
    public function withEventFilter(EventFilter $eventFilter): self
    {
        $this->eventFilter = $eventFilter;
        return $this;
    }

    /**
     * @param Expiration $expiration
     * @return self
     */
    public function withExpiration(Expiration $expiration): self
    {
        $this->expiration = $expiration;
        return $this;
    }

    public function build(): StartEventHandlerDirective
    {
        return ($this->constructor)(
            $this->token,
            $this->eventFilter,
            $this->expiration
        );
    }
}
