<?php

namespace Alexa\Model\Services\Monetization;

abstract class InSkillProductsResponseBuilder
{
    /** @var callable */
    private $constructor;

    /** @var InSkillProduct[] */
    private $inSkillProducts = [];

    /** @var bool|null */
    private $isTruncated = null;

    /** @var string|null */
    private $nextToken = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param InSkillProduct[] $inSkillProducts
     * @return self
     */
    public function withInSkillProducts(array $inSkillProducts): self
    {
        $this->inSkillProducts = $inSkillProducts;
        return $this;
    }

    public function withIsTruncated(bool $isTruncated): self
    {
        $this->isTruncated = $isTruncated;
        return $this;
    }

    public function withNextToken(string $nextToken): self
    {
        $this->nextToken = $nextToken;
        return $this;
    }

    public function build(): InSkillProductsResponse
    {
        return ($this->constructor)(
            $this->inSkillProducts,
            $this->isTruncated,
            $this->nextToken
        );
    }
}
