<?php

namespace Alexa\Model\Interfaces\CustomInterfaceController;

abstract class EventsReceivedRequestBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $token = null;

    /** @var Event[] */
    private $events = [];

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
     * @param array $events
     * @return self
     */
    public function withEvents(array $events): self
    {
        foreach ($events as $element) {
            assert($element instanceof Event);
        }
        $this->events = $events;
        return $this;
    }

    public function build(): EventsReceivedRequest
    {
        return ($this->constructor)(
            $this->token,
            $this->events
        );
    }
}
