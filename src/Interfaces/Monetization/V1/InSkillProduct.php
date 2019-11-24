<?php

namespace Alexa\Model\Interfaces\Monetization\V1;

use JsonSerializable;

final class InSkillProduct implements JsonSerializable
{
    /** @var string|null */
    private $productId = null;

    protected function __construct()
    {
    }

    /**
     * @return string|null
     */
    public function productId()
    {
        return $this->productId;
    }

    public static function builder(): InSkillProductBuilder
    {
        $instance = new self;
        return new class($constructor = function ($productId) use ($instance): InSkillProduct {
            $instance->productId = $productId;
            return $instance;
        }) extends InSkillProductBuilder {};
    }

    /**
     * @param string $productId
     * @return self
     */
    public static function ofProductId(string $productId): InSkillProduct
    {
        $instance = new self;
        $instance->productId = $productId;
        return $instance;
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->productId = isset($data['productId']) ? ((string) $data['productId']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'productId' => $this->productId
        ]);
    }
}
