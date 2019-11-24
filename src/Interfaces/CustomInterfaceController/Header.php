<?php

namespace Alexa\Model\Interfaces\CustomInterfaceController;

use JsonSerializable;

final class Header implements JsonSerializable
{
    /** @var string|null */
    private $namespace = null;

    /** @var string|null */
    private $name = null;

    protected function __construct()
    {
    }

    /**
     * @return string|null
     */
    public function namespace()
    {
        return $this->namespace;
    }

    /**
     * @return string|null
     */
    public function name()
    {
        return $this->name;
    }

    public static function builder(): HeaderBuilder
    {
        $instance = new self;
        return new class($constructor = function ($namespace, $name) use ($instance): Header {
            $instance->namespace = $namespace;
            $instance->name = $name;
            return $instance;
        }) extends HeaderBuilder {};
    }

    /**
     * @param string $namespace
     * @return self
     */
    public static function ofNamespace(string $namespace): Header
    {
        $instance = new self;
        $instance->namespace = $namespace;
        return $instance;
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->namespace = isset($data['namespace']) ? ((string) $data['namespace']) : null;
        $instance->name = isset($data['name']) ? ((string) $data['name']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'namespace' => $this->namespace,
            'name' => $this->name
        ]);
    }
}
