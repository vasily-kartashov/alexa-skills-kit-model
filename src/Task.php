<?php

namespace Alexa\Model;

use \JsonSerializable;

final class Task implements JsonSerializable
{
    /** @var string|null */
    private $name = null;

    /** @var string|null */
    private $version = null;

    /** @var mixed|null */
    private $input = null;

    protected function __construct()
    {
    }

    /**
     * @return string|null
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * @return string|null
     */
    public function version()
    {
        return $this->version;
    }

    /**
     * @return mixed|null
     */
    public function input()
    {
        return $this->input;
    }

    public static function builder(): TaskBuilder
    {
        $instance = new self;
        $constructor = function ($name, $version, $input) use ($instance): Task {
            $instance->name = $name;
            $instance->version = $version;
            $instance->input = $input;
            return $instance;
        };
        return new class($constructor) extends TaskBuilder
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
        $instance->name = isset($data['name']) ? ((string) $data['name']) : null;
        $instance->version = isset($data['version']) ? ((string) $data['version']) : null;
        $instance->input = $data['input'];
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'name' => $this->name,
            'version' => $this->version,
            'input' => $this->input
        ]);
    }
}
