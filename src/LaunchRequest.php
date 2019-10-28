<?php

namespace Alexa\Model;

use \JsonSerializable;

final class LaunchRequest extends Request implements JsonSerializable
{
    const TYPE = 'LaunchRequest';

    /** @var Task|null */
    private $task = null;

    protected function __construct()
    {
        parent::__construct();
        $this->type = self::TYPE;
    }

    /**
     * @return Task|null
     */
    public function task()
    {
        return $this->task;
    }

    public static function builder(): LaunchRequestBuilder
    {
        $instance = new self;
        $constructor = function ($task) use ($instance): LaunchRequest {
            $instance->task = $task;
            return $instance;
        };
        return new class($constructor) extends LaunchRequestBuilder
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
        $instance->type = self::TYPE;
        $instance->task = isset($data['task']) ? Task::fromValue($data['task']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => self::TYPE,
            'task' => $this->task
        ]);
    }
}
