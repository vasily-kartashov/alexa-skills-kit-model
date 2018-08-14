<?php

namespace Alexa\Model\Interfaces\Monetization\V1;

use \JsonSerializable;

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
        $instance = new self();
        $constructor = function ($productId) use ($instance): InSkillProduct {
            $instance->productId = $productId;
            return $instance;
        };
        return new class($constructor) extends InSkillProductBuilder
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
