<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\APLT;

use JsonSerializable;

final class AlexaPresentationApltInterface implements JsonSerializable
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

    public static function builder(): AlexaPresentationApltInterfaceBuilder
    {
        $instance = new self;
        return new class($constructor = function ($runtime) use ($instance): AlexaPresentationApltInterface {
            $instance->runtime = $runtime;
            return $instance;
        }) extends AlexaPresentationApltInterfaceBuilder {};
    }

    /**
     * @param Runtime $runtime
     * @return self
     */
    public static function ofRuntime(Runtime $runtime): AlexaPresentationApltInterface
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
