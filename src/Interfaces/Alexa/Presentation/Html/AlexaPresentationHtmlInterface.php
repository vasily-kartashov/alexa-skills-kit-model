<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\Html;

use \JsonSerializable;

final class AlexaPresentationHtmlInterface implements JsonSerializable
{
    /** @var Runtime|null */
    private $runtime = null;

    protected function __construct()
    {
    }

    /**
     * @return Runtime|null
     */
    public function runtime()
    {
        return $this->runtime;
    }

    public static function builder(): AlexaPresentationHtmlInterfaceBuilder
    {
        $instance = new self;
        $constructor = function ($runtime) use ($instance): AlexaPresentationHtmlInterface {
            $instance->runtime = $runtime;
            return $instance;
        };
        return new class($constructor) extends AlexaPresentationHtmlInterfaceBuilder
        {
            public function __construct(callable $constructor)
            {
                parent::__construct($constructor);
            }
        };
    }

    /**
     * @param Runtime $runtime
     * @return self
     */
    public static function ofRuntime(Runtime $runtime): AlexaPresentationHtmlInterface
    {
        $instance = new self;
        $instance->runtime = $runtime;
        return $instance;
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->runtime = isset($data['runtime']) ? Runtime::fromValue($data['runtime']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'runtime' => $this->runtime
        ]);
    }
}
