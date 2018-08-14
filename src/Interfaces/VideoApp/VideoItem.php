<?php

namespace Alexa\Model\Interfaces\VideoApp;

use \JsonSerializable;

final class VideoItem implements JsonSerializable
{
    /** @var string|null */
    private $source = null;

    /** @var Metadata|null */
    private $metadata = null;

    protected function __construct()
    {
    }

    /**
     * @return string|null
     */
    public function source()
    {
        return $this->source;
    }

    /**
     * @return Metadata|null
     */
    public function metadata()
    {
        return $this->metadata;
    }

    public static function builder(): VideoItemBuilder
    {
        $instance = new self();
        $constructor = function ($source, $metadata) use ($instance): VideoItem {
            $instance->source = $source;
            $instance->metadata = $metadata;
            return $instance;
        };
        return new class($constructor) extends VideoItemBuilder
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
        $instance->source = isset($data['source']) ? ((string) $data['source']) : null;
        $instance->metadata = isset($data['metadata']) ? Metadata::fromValue($data['metadata']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'source' => $this->source,
            'metadata' => $this->metadata
        ]);
    }
}
