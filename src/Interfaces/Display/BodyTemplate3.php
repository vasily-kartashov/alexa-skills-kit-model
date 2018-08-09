<?php

namespace Alexa\Model\Interfaces\Display;

use \JsonSerializable;

final class BodyTemplate3 extends Template implements JsonSerializable
{
    const TYPE = 'BodyTemplate3';

    /** @var Image|null */
    private $backgroundImage = null;

    /** @var Image|null */
    private $image = null;

    /** @var string|null */
    private $title = null;

    /** @var TextContent|null */
    private $textContent = null;

    protected function __construct()
    {
        parent::__construct();
    }

    /**
     * @return Image|null
     */
    public function backgroundImage()
    {
        return $this->backgroundImage;
    }

    /**
     * @return Image|null
     */
    public function image()
    {
        return $this->image;
    }

    /**
     * @return string|null
     */
    public function title()
    {
        return $this->title;
    }

    /**
     * @return TextContent|null
     */
    public function textContent()
    {
        return $this->textContent;
    }

    public static function builder(): BodyTemplate3Builder
    {
        $instance = new self();
        $constructor = function ($backgroundImage, $image, $title, $textContent) use ($instance): BodyTemplate3 {
            $instance->backgroundImage = $backgroundImage;
            $instance->image = $image;
            $instance->title = $title;
            $instance->textContent = $textContent;
            return $instance;
        };
        return new class($constructor) extends BodyTemplate3Builder
        {
            public function __construct(callable $constructor)
            {
                parent::__construct($constructor);
            }
        };
    }

    public static function fromValue(array $data)
    {
        $instance = new self();
        $instance->type = self::TYPE;
        $instance->backgroundImage = isset($data['backgroundImage']) ? Image::fromValue($data['backgroundImage']) : null;
        $instance->image = isset($data['image']) ? Image::fromValue($data['image']) : null;
        $instance->title = isset($data['title']) ? ((string) $data['title']) : null;
        $instance->textContent = isset($data['textContent']) ? TextContent::fromValue($data['textContent']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => self::TYPE,
            'backgroundImage' => $this->backgroundImage,
            'image' => $this->image,
            'title' => $this->title,
            'textContent' => $this->textContent
        ]);
    }
}
