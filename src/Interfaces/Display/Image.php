<?php

namespace Alexa\Model\Interfaces\Display;

use \JsonSerializable;

final class Image implements JsonSerializable
{
    /** @var string|null */
    private $contentDescription = null;

    /** @var ImageInstance[] */
    private $sources = [];

    protected function __construct()
    {
    }

    /**
     * @return string|null
     */
    public function contentDescription()
    {
        return $this->contentDescription;
    }

    /**
     * @return ImageInstance[]
     */
    public function sources()
    {
        return $this->sources;
    }

    public static function builder(): ImageBuilder
    {
        $instance = new self();
        $constructor = function ($contentDescription, $sources) use ($instance): Image {
            $instance->contentDescription = $contentDescription;
            $instance->sources = $sources;
            return $instance;
        };
        return new class($constructor) extends ImageBuilder
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
        $instance->contentDescription = isset($data['contentDescription']) ? ((string) $data['contentDescription']) : null;
        $instance->sources = [];
        foreach ($data['sources'] as $item) {
            $element = isset($item) ? ImageInstance::fromValue($item) : null;
            if ($element !== null) {
                $instance->sources[] = $element;
            }
        }
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'contentDescription' => $this->contentDescription,
            'sources' => $this->sources
        ]);
    }
}
