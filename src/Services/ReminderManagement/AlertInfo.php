<?php

namespace Alexa\Model\Services\ReminderManagement;

use JsonSerializable;

final class AlertInfo implements JsonSerializable
{
    /** @var AlertInfoSpokenInfo|null */
    private $spokenInfo = null;

    protected function __construct()
    {
    }

    /**
     * @return AlertInfoSpokenInfo|null
     */
    public function spokenInfo()
    {
        return $this->spokenInfo;
    }

    public static function builder(): AlertInfoBuilder
    {
        $instance = new self;
        return new class($constructor = function ($spokenInfo) use ($instance): AlertInfo {
            $instance->spokenInfo = $spokenInfo;
            return $instance;
        }) extends AlertInfoBuilder {};
    }

    /**
     * @param AlertInfoSpokenInfo $spokenInfo
     * @return self
     */
    public static function ofSpokenInfo(AlertInfoSpokenInfo $spokenInfo): AlertInfo
    {
        $instance = new self;
        $instance->spokenInfo = $spokenInfo;
        return $instance;
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->spokenInfo = isset($data['spokenInfo']) ? AlertInfoSpokenInfo::fromValue($data['spokenInfo']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'spokenInfo' => $this->spokenInfo
        ]);
    }
}
