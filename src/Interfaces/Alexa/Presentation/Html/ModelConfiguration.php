<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\Html;

use JsonSerializable;

final class ModelConfiguration implements JsonSerializable
{
    /** @var int|null */
    private $timeoutInSeconds = null;

    protected function __construct()
    {
    }

    /**
     * @return int|null
     */
    public function timeoutInSeconds()
    {
        return $this->timeoutInSeconds;
    }

    public static function builder(): ModelConfigurationBuilder
    {
        $instance = new self;
        return new class($constructor = function ($timeoutInSeconds) use ($instance): ModelConfiguration {
            $instance->timeoutInSeconds = $timeoutInSeconds;
            return $instance;
        }) extends ModelConfigurationBuilder {};
    }

    /**
     * @param int $timeoutInSeconds
     * @return self
     */
    public static function ofTimeoutInSeconds(int $timeoutInSeconds): ModelConfiguration
    {
        $instance = new self;
        $instance->timeoutInSeconds = $timeoutInSeconds;
        return $instance;
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->timeoutInSeconds = isset($data['timeoutInSeconds']) ? ((int) $data['timeoutInSeconds']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'timeoutInSeconds' => $this->timeoutInSeconds
        ]);
    }
}
