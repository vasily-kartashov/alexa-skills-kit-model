<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\APL;

use \JsonSerializable;

final class AnimatedOpacityProperty extends AnimatedProperty implements JsonSerializable
{
    const PROPERTY = 'opacity';

    /** @var string|null */
    private $from = null;

    /** @var string|null */
    private $to = null;

    protected function __construct()
    {
        parent::__construct();
        $this->property = self::PROPERTY;
    }

    /**
     * @return string|null
     */
    public function from()
    {
        return $this->from;
    }

    /**
     * @return string|null
     */
    public function to()
    {
        return $this->to;
    }

    public static function builder(): AnimatedOpacityPropertyBuilder
    {
        $instance = new self();
        $constructor = function ($from, $to) use ($instance): AnimatedOpacityProperty {
            $instance->from = $from;
            $instance->to = $to;
            return $instance;
        };
        return new class($constructor) extends AnimatedOpacityPropertyBuilder
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
        $instance->property = self::PROPERTY;
        $instance->from = isset($data['from']) ? ((string) $data['from']) : null;
        $instance->to = isset($data['to']) ? ((string) $data['to']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'property' => self::PROPERTY,
            'from' => $this->from,
            'to' => $this->to
        ]);
    }
}
