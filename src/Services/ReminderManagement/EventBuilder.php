<?php

namespace Alexa\Model\Services\ReminderManagement;

abstract class EventBuilder
{
    /** @var callable */
    private $constructor;

    /** @var Status|null */
    private $status = null;

    /** @var string|null */
    private $alertToken = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param mixed $status
     * @return self
     */
    public function withStatus(Status $status): self
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @param mixed $alertToken
     * @return self
     */
    public function withAlertToken(string $alertToken): self
    {
        $this->alertToken = $alertToken;
        return $this;
    }

    public function build(): Event
    {
        return ($this->constructor)(
            $this->status,
            $this->alertToken
        );
    }
}
