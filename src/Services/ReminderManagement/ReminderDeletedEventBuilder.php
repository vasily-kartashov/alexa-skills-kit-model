<?php

namespace Alexa\Model\Services\ReminderManagement;

abstract class ReminderDeletedEventBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string[] */
    private $alertTokens = [];

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param array $alertTokens
     * @return self
     */
    public function withAlertTokens(array $alertTokens): self
    {
        foreach ($alertTokens as $element) {
            assert(is_string($element));
        }
        $this->alertTokens = $alertTokens;
        return $this;
    }

    public function build(): ReminderDeletedEvent
    {
        return ($this->constructor)(
            $this->alertTokens
        );
    }
}
