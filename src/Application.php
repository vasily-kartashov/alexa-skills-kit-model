<?php

namespace Alexa\Model;

use JsonSerializable;

final class Application implements JsonSerializable
{
    /** @var string|null */
    private $applicationId = null;

    protected function __construct()
    {
    }

    /**
     * @return string|null
     */
    public function applicationId()
    {
        return $this->applicationId;
    }

    public static function builder(): ApplicationBuilder
    {
        $instance = new self;
        return new class($constructor = function ($applicationId) use ($instance): Application {
            $instance->applicationId = $applicationId;
            return $instance;
        }) extends ApplicationBuilder {};
    }

    /**
     * @param string $applicationId
     * @return self
     */
    public static function ofApplicationId(string $applicationId): Application
    {
        $instance = new self;
        $instance->applicationId = $applicationId;
        return $instance;
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->applicationId = isset($data['applicationId']) ? ((string) $data['applicationId']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'applicationId' => $this->applicationId
        ]);
    }
}
