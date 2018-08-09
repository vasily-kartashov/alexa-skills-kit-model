<?php

namespace Alexa\Model\Services\Monetization;

use \JsonSerializable;

final class InSkillProductsResponse implements JsonSerializable
{
    /** @var InSkillProduct[] */
    private $inSkillProducts = [];

    /** @var bool|null */
    private $isTruncated = null;

    /** @var string|null */
    private $nextToken = null;

    protected function __construct()
    {
    }

    /**
     * @return InSkillProduct[]
     */
    public function inSkillProducts()
    {
        return $this->inSkillProducts;
    }

    /**
     * @return bool|null
     */
    public function isTruncated()
    {
        return $this->isTruncated;
    }

    /**
     * @return string|null
     */
    public function nextToken()
    {
        return $this->nextToken;
    }

    public static function builder(): InSkillProductsResponseBuilder
    {
        $instance = new self();
        $constructor = function ($inSkillProducts, $isTruncated, $nextToken) use ($instance): InSkillProductsResponse {
            $instance->inSkillProducts = $inSkillProducts;
            $instance->isTruncated = $isTruncated;
            $instance->nextToken = $nextToken;
            return $instance;
        };
        return new class($constructor) extends InSkillProductsResponseBuilder
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
        $instance->inSkillProducts = [];
        foreach ($data['inSkillProducts'] as $item) {
            $element = isset($item) ? InSkillProduct::fromValue($item) : null;
            if ($element) {
                $instance->inSkillProducts[] = $element;
            }
        }
        $instance->isTruncated = isset($data['isTruncated']) ? ((bool) $data['isTruncated']) : null;
        $instance->nextToken = isset($data['nextToken']) ? ((string) $data['nextToken']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'inSkillProducts' => $this->inSkillProducts,
            'isTruncated' => $this->isTruncated,
            'nextToken' => $this->nextToken
        ]);
    }
}
