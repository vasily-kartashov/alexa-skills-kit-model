<?php

namespace Alexa\Model\Interfaces\AudioPlayer;

use Alexa\Model\Interfaces\Display\Image;
use \JsonSerializable;

final class AudioItemMetadata implements JsonSerializable
{
    /** @var string|null */
    private $title = null;

    /** @var string|null */
    private $subtitle = null;

    /** @var Image|null */
    private $art = null;

    /** @var Image|null */
    private $backgroundImage = null;

    protected function __construct()
    {
    }

    /**
     * @return string|null
     */
    public function title()
    {
        return $this->title;
    }

    /**
     * @return string|null
     */
    public function subtitle()
    {
        return $this->subtitle;
    }

    /**
     * @return Image|null
     */
    public function art()
    {
        return $this->art;
    }

    /**
     * @return Image|null
     */
    public function backgroundImage()
    {
        return $this->backgroundImage;
    }

    public static function builder(): AudioItemMetadataBuilder
    {
        $instance = new self();
        $constructor = function ($title, $subtitle, $art, $backgroundImage) use ($instance): AudioItemMetadata {
            $instance->title = $title;
            $instance->subtitle = $subtitle;
            $instance->art = $art;
            $instance->backgroundImage = $backgroundImage;
            return $instance;
        };
        return new class($constructor) extends AudioItemMetadataBuilder
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
        $instance->title = isset($data['title']) ? ((string) $data['title']) : null;
        $instance->subtitle = isset($data['subtitle']) ? ((string) $data['subtitle']) : null;
        $instance->art = isset($data['art']) ? Image::fromValue($data['art']) : null;
        $instance->backgroundImage = isset($data['backgroundImage']) ? Image::fromValue($data['backgroundImage']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'art' => $this->art,
            'backgroundImage' => $this->backgroundImage
        ]);
    }
}
