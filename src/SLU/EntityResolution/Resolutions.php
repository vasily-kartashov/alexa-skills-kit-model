<?php

namespace Alexa\Model\SLU\EntityResolution;

use JsonSerializable;

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
        $instance = new self;
        return new class($constructor = function ($resolutionsPerAuthority) use ($instance): Resolutions {
            $instance->resolutionsPerAuthority = $resolutionsPerAuthority;
            return $instance;
        }) extends ResolutionsBuilder {};
    }

    /**
     * @param array $resolutionsPerAuthority
     * @return self
     */
    public static function ofResolutionsPerAuthority(array $resolutionsPerAuthority): Resolutions
    {
        $instance = new self;
        $instance->resolutionsPerAuthority = $resolutionsPerAuthority;
        return $instance;
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->resolutionsPerAuthority = [];
        if (isset($data['resolutionsPerAuthority'])) {
            foreach ($data['resolutionsPerAuthority'] as $item) {
                $element = isset($item) ? Resolution::fromValue($item) : null;
                if ($element !== null) {
                    $instance->resolutionsPerAuthority[] = $element;
                }
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
