<?php

namespace Alexa\Model;

use \JsonSerializable;

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
        $constructor = function ($applicationId) use ($instance): Application {
            $instance->applicationId = $applicationId;
            return $instance;
        };
        return new class($constructor) extends ApplicationBuilder
        {
            public function __construct(callable $constructor)
            {
                parent::__construct($constructor);
            }
        };
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
