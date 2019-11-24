<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\APL;

use \JsonSerializable;

final class ComponentVisibleOnScreenListItemTag implements JsonSerializable
{
    /** @var int|null */
    private $index = null;

    protected function __construct()
    {
    }

    /**
     * @return int|null
     */
    public function index()
    {
        return $this->index;
    }

    public static function builder(): ComponentVisibleOnScreenListItemTagBuilder
    {
        $instance = new self;
        $constructor = function ($index) use ($instance): ComponentVisibleOnScreenListItemTag {
            $instance->index = $index;
            return $instance;
        };
        return new class($constructor) extends ComponentVisibleOnScreenListItemTagBuilder
        {
            public function __construct(callable $constructor)
            {
                parent::__construct($constructor);
            }
        };
    }

    /**
     * @param int $index
     * @return self
     */
    public static function ofIndex(int $index): ComponentVisibleOnScreenListItemTag
    {
        $instance = new self;
        $instance->index = $index;
        return $instance;
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->index = isset($data['index']) ? ((int) $data['index']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'index' => $this->index
        ]);
    }
}
