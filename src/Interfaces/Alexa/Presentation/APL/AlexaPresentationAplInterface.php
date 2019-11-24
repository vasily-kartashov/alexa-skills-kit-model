<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\APL;

use JsonSerializable;

final class AlexaPresentationAplInterface implements JsonSerializable
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

    public static function builder(): AlexaPresentationAplInterfaceBuilder
    {
        $instance = new self;
        return new class($constructor = function ($runtime) use ($instance): AlexaPresentationAplInterface {
            $instance->runtime = $runtime;
            return $instance;
        }) extends AlexaPresentationAplInterfaceBuilder {};
    }

    /**
     * @param Runtime $runtime
     * @return self
     */
    public static function ofRuntime(Runtime $runtime): AlexaPresentationAplInterface
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
