<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\APLT;

use JsonSerializable;

final class Runtime implements JsonSerializable
{
    /** @var string|null */
    private $maxVersion = null;

    protected function __construct()
    {
    }

    /**
     * @return string|null
     */
    public function maxVersion()
    {
        return $this->maxVersion;
    }

    public static function builder(): RuntimeBuilder
    {
        $instance = new self;
        return new class($constructor = function ($maxVersion) use ($instance): Runtime {
            $instance->maxVersion = $maxVersion;
            return $instance;
        }) extends RuntimeBuilder {};
    }

    /**
     * @param string $maxVersion
     * @return self
     */
    public static function ofMaxVersion(string $maxVersion): Runtime
    {
        $instance = new self;
        $instance->maxVersion = $maxVersion;
        return $instance;
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->maxVersion = isset($data['maxVersion']) ? ((string) $data['maxVersion']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'maxVersion' => $this->maxVersion
        ]);
    }
}
