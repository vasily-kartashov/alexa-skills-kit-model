<?php

namespace Alexa\Model\Interfaces\AudioPlayer;

use JsonSerializable;

final class AudioItem implements JsonSerializable
{
    /** @var Stream|null */
    private $stream = null;

    /** @var AudioItemMetadata|null */
    private $metadata = null;

    protected function __construct()
    {
    }

    /**
     * @return Stream|null
     */
    public function stream()
    {
        return $this->stream;
    }

    /**
     * @return AudioItemMetadata|null
     */
    public function metadata()
    {
        return $this->metadata;
    }

    public static function builder(): AudioItemBuilder
    {
        $instance = new self;
        return new class($constructor = function ($stream, $metadata) use ($instance): AudioItem {
            $instance->stream = $stream;
            $instance->metadata = $metadata;
            return $instance;
        }) extends AudioItemBuilder {};
    }

    /**
     * @param Stream $stream
     * @return self
     */
    public static function ofStream(Stream $stream): AudioItem
    {
        $instance = new self;
        $instance->stream = $stream;
        return $instance;
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->stream = isset($data['stream']) ? Stream::fromValue($data['stream']) : null;
        $instance->metadata = isset($data['metadata']) ? AudioItemMetadata::fromValue($data['metadata']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'stream' => $this->stream,
            'metadata' => $this->metadata
        ]);
    }
}
