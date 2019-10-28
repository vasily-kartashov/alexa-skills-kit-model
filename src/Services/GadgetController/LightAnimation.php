<?php

namespace Alexa\Model\Services\GadgetController;

use \JsonSerializable;

final class LightAnimation implements JsonSerializable
{
    /** @var int|null */
    private $repeat = null;

    /** @var string[] */
    private $targetLights = [];

    /** @var AnimationStep[] */
    private $sequence = [];

    protected function __construct()
    {
    }

    /**
     * @return int|null
     */
    public function repeat()
    {
        return $this->repeat;
    }

    /**
     * @return string[]
     */
    public function targetLights()
    {
        return $this->targetLights;
    }

    /**
     * @return AnimationStep[]
     */
    public function sequence()
    {
        return $this->sequence;
    }

    public static function builder(): LightAnimationBuilder
    {
        $instance = new self;
        $constructor = function ($repeat, $targetLights, $sequence) use ($instance): LightAnimation {
            $instance->repeat = $repeat;
            $instance->targetLights = $targetLights;
            $instance->sequence = $sequence;
            return $instance;
        };
        return new class($constructor) extends LightAnimationBuilder
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
        $instance = new self;
        $instance->repeat = isset($data['repeat']) ? ((int) $data['repeat']) : null;
        $instance->targetLights = [];
        if (isset($data['targetLights'])) {
            foreach ($data['targetLights'] as $item) {
                $element = isset($item) ? ((string) $item) : null;
                if ($element !== null) {
                    $instance->targetLights[] = $element;
                }
            }
        }
        $instance->sequence = [];
        if (isset($data['sequence'])) {
            foreach ($data['sequence'] as $item) {
                $element = isset($item) ? AnimationStep::fromValue($item) : null;
                if ($element !== null) {
                    $instance->sequence[] = $element;
                }
            }
        }
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'repeat' => $this->repeat,
            'targetLights' => $this->targetLights,
            'sequence' => $this->sequence
        ]);
    }
}
