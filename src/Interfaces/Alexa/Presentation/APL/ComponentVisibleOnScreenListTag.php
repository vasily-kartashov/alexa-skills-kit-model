<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\APL;

use JsonSerializable;

final class ComponentVisibleOnScreenListTag implements JsonSerializable
{
    /** @var int|null */
    private $itemCount = null;

    /** @var int|null */
    private $lowestIndexSeen = null;

    /** @var int|null */
    private $highestIndexSeen = null;

    /** @var int|null */
    private $lowestOrdinalSeen = null;

    /** @var int|null */
    private $highestOrdinalSeen = null;

    protected function __construct()
    {
    }

    /**
     * @return int|null
     */
    public function itemCount()
    {
        return $this->itemCount;
    }

    /**
     * @return int|null
     */
    public function lowestIndexSeen()
    {
        return $this->lowestIndexSeen;
    }

    /**
     * @return int|null
     */
    public function highestIndexSeen()
    {
        return $this->highestIndexSeen;
    }

    /**
     * @return int|null
     */
    public function lowestOrdinalSeen()
    {
        return $this->lowestOrdinalSeen;
    }

    /**
     * @return int|null
     */
    public function highestOrdinalSeen()
    {
        return $this->highestOrdinalSeen;
    }

    public static function builder(): ComponentVisibleOnScreenListTagBuilder
    {
        $instance = new self;
        return new class($constructor = function ($itemCount, $lowestIndexSeen, $highestIndexSeen, $lowestOrdinalSeen, $highestOrdinalSeen) use ($instance): ComponentVisibleOnScreenListTag {
            $instance->itemCount = $itemCount;
            $instance->lowestIndexSeen = $lowestIndexSeen;
            $instance->highestIndexSeen = $highestIndexSeen;
            $instance->lowestOrdinalSeen = $lowestOrdinalSeen;
            $instance->highestOrdinalSeen = $highestOrdinalSeen;
            return $instance;
        }) extends ComponentVisibleOnScreenListTagBuilder {};
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->itemCount = isset($data['itemCount']) ? ((int) $data['itemCount']) : null;
        $instance->lowestIndexSeen = isset($data['lowestIndexSeen']) ? ((int) $data['lowestIndexSeen']) : null;
        $instance->highestIndexSeen = isset($data['highestIndexSeen']) ? ((int) $data['highestIndexSeen']) : null;
        $instance->lowestOrdinalSeen = isset($data['lowestOrdinalSeen']) ? ((int) $data['lowestOrdinalSeen']) : null;
        $instance->highestOrdinalSeen = isset($data['highestOrdinalSeen']) ? ((int) $data['highestOrdinalSeen']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'itemCount' => $this->itemCount,
            'lowestIndexSeen' => $this->lowestIndexSeen,
            'highestIndexSeen' => $this->highestIndexSeen,
            'lowestOrdinalSeen' => $this->lowestOrdinalSeen,
            'highestOrdinalSeen' => $this->highestOrdinalSeen
        ]);
    }
}
