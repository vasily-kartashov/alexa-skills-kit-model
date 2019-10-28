<?php

namespace Alexa\Model\Interfaces\Viewport\APL;

use \JsonSerializable;

final class ViewportConfiguration implements JsonSerializable
{
    /** @var CurrentConfiguration|null */
    private $current = null;

    protected function __construct()
    {
    }

    /**
     * @return CurrentConfiguration|null
     */
    public function current()
    {
        return $this->current;
    }

    public static function builder(): ViewportConfigurationBuilder
    {
        $instance = new self();
        $constructor = function ($current) use ($instance): ViewportConfiguration {
            $instance->current = $current;
            return $instance;
        };
        return new class($constructor) extends ViewportConfigurationBuilder
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
        $instance = new self();
        $instance->current = isset($data['current']) ? CurrentConfiguration::fromValue($data['current']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'current' => $this->current
        ]);
    }
}
