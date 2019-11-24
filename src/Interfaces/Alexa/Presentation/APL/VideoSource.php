<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\APL;

use JsonSerializable;

final class VideoSource implements JsonSerializable
{
    /** @var string|null */
    private $description = null;

    /** @var string|null */
    private $duration = null;

    /** @var string|null */
    private $url = null;

    /** @var string|null */
    private $repeatCount = null;

    /** @var string|null */
    private $offset = null;

    protected function __construct()
    {
    }

    /**
     * @return string|null
     */
    public function description()
    {
        return $this->description;
    }

    /**
     * @return string|null
     */
    public function duration()
    {
        return $this->duration;
    }

    /**
     * @return string|null
     */
    public function url()
    {
        return $this->url;
    }

    /**
     * @return string|null
     */
    public function repeatCount()
    {
        return $this->repeatCount;
    }

    /**
     * @return string|null
     */
    public function offset()
    {
        return $this->offset;
    }

    public static function builder(): VideoSourceBuilder
    {
        $instance = new self;
        return new class($constructor = function ($description, $duration, $url, $repeatCount, $offset) use ($instance): VideoSource {
            $instance->description = $description;
            $instance->duration = $duration;
            $instance->url = $url;
            $instance->repeatCount = $repeatCount;
            $instance->offset = $offset;
            return $instance;
        }) extends VideoSourceBuilder {};
    }

    /**
     * @param string $description
     * @return self
     */
    public static function ofDescription(string $description): VideoSource
    {
        $instance = new self;
        $instance->description = $description;
        return $instance;
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->description = isset($data['description']) ? ((string) $data['description']) : null;
        $instance->duration = isset($data['duration']) ? ((string) $data['duration']) : null;
        $instance->url = isset($data['url']) ? ((string) $data['url']) : null;
        $instance->repeatCount = isset($data['repeatCount']) ? ((string) $data['repeatCount']) : null;
        $instance->offset = isset($data['offset']) ? ((string) $data['offset']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'description' => $this->description,
            'duration' => $this->duration,
            'url' => $this->url,
            'repeatCount' => $this->repeatCount,
            'offset' => $this->offset
        ]);
    }
}
