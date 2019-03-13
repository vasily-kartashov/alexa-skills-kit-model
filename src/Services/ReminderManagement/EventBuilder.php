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

    public function withStatus(Status $status): self
    {
        $this->status = $status;
        return $this;
    }

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
