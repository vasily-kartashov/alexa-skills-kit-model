<?php

namespace Alexa\Model\Services\ReminderManagement;

use JsonSerializable;

final class ReminderDeletedEvent implements JsonSerializable
{
    /** @var string[] */
    private $alertTokens = [];

    protected function __construct()
    {
    }

    /**
     * @return string[]
     */
    public function alertTokens()
    {
        return $this->alertTokens;
    }

    public static function builder(): ReminderDeletedEventBuilder
    {
        $instance = new self;
        return new class($constructor = function ($alertTokens) use ($instance): ReminderDeletedEvent {
            $instance->alertTokens = $alertTokens;
            return $instance;
        }) extends ReminderDeletedEventBuilder {};
    }

    /**
     * @param array $alertTokens
     * @return self
     */
    public static function ofAlertTokens(array $alertTokens): ReminderDeletedEvent
    {
        $instance = new self;
        $instance->alertTokens = $alertTokens;
        return $instance;
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->alertTokens = [];
        if (isset($data['alertTokens'])) {
            foreach ($data['alertTokens'] as $item) {
                $element = isset($item) ? ((string) $item) : null;
                if ($element !== null) {
                    $instance->alertTokens[] = $element;
                }
            }
        }
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'alertTokens' => $this->alertTokens
        ]);
    }
}
