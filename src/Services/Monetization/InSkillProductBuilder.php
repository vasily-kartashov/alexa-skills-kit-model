<?php

namespace Alexa\Model\Services\Monetization;

abstract class InSkillProductBuilder
{
    /** @var callable */
    private $constructor;

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

    /** @var int|null */
    private $activeEntitlementCount = null;

    /** @var PurchaseMode|null */
    private $purchaseMode = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    public function withProductId(string $productId): self
    {
        $this->productId = $productId;
        return $this;
    }

    public function withReferenceName(string $referenceName): self
    {
        $this->referenceName = $referenceName;
        return $this;
    }

    public function withName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function withType(ProductType $type): self
    {
        $this->type = $type;
        return $this;
    }

    public function withSummary(string $summary): self
    {
        $this->summary = $summary;
        return $this;
    }

    public function withPurchasable(PurchasableState $purchasable): self
    {
        $this->purchasable = $purchasable;
        return $this;
    }

    public function withEntitled(EntitledState $entitled): self
    {
        $this->entitled = $entitled;
        return $this;
    }

    public function withActiveEntitlementCount(int $activeEntitlementCount): self
    {
        $this->activeEntitlementCount = $activeEntitlementCount;
        return $this;
    }

    public function withPurchaseMode(PurchaseMode $purchaseMode): self
    {
        $this->purchaseMode = $purchaseMode;
        return $this;
    }

    public function build(): InSkillProduct
    {
        return ($this->constructor)(
            $this->productId,
            $this->referenceName,
            $this->name,
            $this->type,
            $this->summary,
            $this->purchasable,
            $this->entitled,
            $this->activeEntitlementCount,
            $this->purchaseMode
        );
    }
}
