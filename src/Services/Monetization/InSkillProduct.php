<?php

namespace Alexa\Model\Services\Monetization;

use \JsonSerializable;

final class InSkillProduct implements JsonSerializable
{
    /** @var string|null */
    private $productId = null;

    /** @var string|null */
    private $referenceName = null;

    /** @var string|null */
    private $name = null;

    /** @var ProductType|null */
    private $type = null;

    /** @var string|null */
    private $summary = null;

    /** @var PurchasableState|null */
    private $purchasable = null;

    /** @var EntitledState|null */
    private $entitled = null;

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

    /**
     * @return string|null
     */
    public function referenceName()
    {
        return $this->referenceName;
    }

    /**
     * @return string|null
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * @return ProductType|null
     */
    public function type()
    {
        return $this->type;
    }

    /**
     * @return string|null
     */
    public function summary()
    {
        return $this->summary;
    }

    /**
     * @return PurchasableState|null
     */
    public function purchasable()
    {
        return $this->purchasable;
    }

    /**
     * @return EntitledState|null
     */
    public function entitled()
    {
        return $this->entitled;
    }

    public static function builder(): InSkillProductBuilder
    {
        $instance = new self();
        $constructor = function ($productId, $referenceName, $name, $type, $summary, $purchasable, $entitled) use ($instance): InSkillProduct {
            $instance->productId = $productId;
            $instance->referenceName = $referenceName;
            $instance->name = $name;
            $instance->type = $type;
            $instance->summary = $summary;
            $instance->purchasable = $purchasable;
            $instance->entitled = $entitled;
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

    public static function fromValue(array $data)
    {
        $instance = new self();
        $instance->productId = isset($data['productId']) ? ((string) $data['productId']) : null;
        $instance->referenceName = isset($data['referenceName']) ? ((string) $data['referenceName']) : null;
        $instance->name = isset($data['name']) ? ((string) $data['name']) : null;
        $instance->type = isset($data['type']) ? ProductType::fromValue($data['type']) : null;
        $instance->summary = isset($data['summary']) ? ((string) $data['summary']) : null;
        $instance->purchasable = isset($data['purchasable']) ? PurchasableState::fromValue($data['purchasable']) : null;
        $instance->entitled = isset($data['entitled']) ? EntitledState::fromValue($data['entitled']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'productId' => $this->productId,
            'referenceName' => $this->referenceName,
            'name' => $this->name,
            'type' => $this->type,
            'summary' => $this->summary,
            'purchasable' => $this->purchasable,
            'entitled' => $this->entitled
        ]);
    }
}
