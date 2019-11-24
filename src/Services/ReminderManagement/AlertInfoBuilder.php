<?php

namespace Alexa\Model\Services\ReminderManagement;

abstract class AlertInfoBuilder
{
    /** @var callable */
    private $constructor;

    /** @var AlertInfoSpokenInfo|null */
    private $spokenInfo = null;

    public function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param AlertInfoSpokenInfo $spokenInfo
     * @return self
     */
    public function withSpokenInfo(AlertInfoSpokenInfo $spokenInfo): self
    {
        $this->spokenInfo = $spokenInfo;
        return $this;
    }

    public function build(): AlertInfo
    {
        return ($this->constructor)(
            $this->spokenInfo
        );
    }
}
