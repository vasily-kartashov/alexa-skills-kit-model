<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\APL;

use \JsonSerializable;

final class ComponentVisibleOnScreenScrollableTag implements JsonSerializable
{
    /** @var ComponentVisibleOnScreenScrollableTagDirectionEnum|null */
    private $direction = null;

    /** @var bool|null */
    private $allowForward = null;

    /** @var bool|null */
    private $allowBackward = null;

    protected function __construct()
    {
    }

    /**
     * @return ComponentVisibleOnScreenScrollableTagDirectionEnum|null
     */
    public function direction()
    {
        return $this->direction;
    }

    /**
     * @return bool|null
     */
    public function allowForward()
    {
        return $this->allowForward;
    }

    /**
     * @return bool|null
     */
    public function allowBackward()
    {
        return $this->allowBackward;
    }

    public static function builder(): ComponentVisibleOnScreenScrollableTagBuilder
    {
        $instance = new self;
        $constructor = function ($direction, $allowForward, $allowBackward) use ($instance): ComponentVisibleOnScreenScrollableTag {
            $instance->direction = $direction;
            $instance->allowForward = $allowForward;
            $instance->allowBackward = $allowBackward;
            return $instance;
        };
        return new class($constructor) extends ComponentVisibleOnScreenScrollableTagBuilder
        {
            public function __construct(callable $constructor)
            {
                parent::__construct($constructor);
            }
        };
    }

    /**
     * @param ComponentVisibleOnScreenScrollableTagDirectionEnum $direction
     * @return self
     */
    public static function ofDirection(ComponentVisibleOnScreenScrollableTagDirectionEnum $direction): ComponentVisibleOnScreenScrollableTag
    {
        $instance = new self;
        $instance->direction = $direction;
        return $instance;
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->direction = isset($data['direction']) ? ComponentVisibleOnScreenScrollableTagDirectionEnum::fromValue($data['direction']) : null;
        $instance->allowForward = isset($data['allowForward']) ? ((bool) $data['allowForward']) : null;
        $instance->allowBackward = isset($data['allowBackward']) ? ((bool) $data['allowBackward']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'direction' => $this->direction,
            'allowForward' => $this->allowForward,
            'allowBackward' => $this->allowBackward
        ]);
    }
}
