<?php

namespace Alexa\Model\SLU\EntityResolution;

use \JsonSerializable;

final class Resolutions implements JsonSerializable
{
    /** @var Resolution[] */
    private $resolutionsPerAuthority = [];

    protected function __construct()
    {
    }

    /**
     * @return Resolution[]
     */
    public function resolutionsPerAuthority()
    {
        return $this->resolutionsPerAuthority;
    }

    public static function builder(): ResolutionsBuilder
    {
        $instance = new self();
        $constructor = function ($resolutionsPerAuthority) use ($instance): Resolutions {
            $instance->resolutionsPerAuthority = $resolutionsPerAuthority;
            return $instance;
        };
        return new class($constructor) extends ResolutionsBuilder
        {
            public function __construct(callable $constructor)
            {
                parent::__construct($constructor);
            }
        };
    }

    public static function fromValue(array $data)
    {
        $instance = new self();
        $instance->resolutionsPerAuthority = [];
        foreach ($data['resolutionsPerAuthority'] as $item) {
            $element = isset($item) ? Resolution::fromValue($item) : null;
            if ($element) {
                $instance->resolutionsPerAuthority[] = $element;
            }
        }
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'resolutionsPerAuthority' => $this->resolutionsPerAuthority
        ]);
    }
}
