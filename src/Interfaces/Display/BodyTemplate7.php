<?php

namespace Alexa\Model\Interfaces\Display;

use \JsonSerializable;

final class BodyTemplate7 extends Template implements JsonSerializable
{
    const TYPE = 'BodyTemplate7';

    /** @var string|null */
    private $title = null;

    /** @var Image|null */
    private $image = null;

    /** @var Image|null */
    private $backgroundImage = null;

    protected function __construct()
    {
        parent::__construct();
        $this->type = self::TYPE;
    }

    /**
     * @return string|null
     */
    public function title()
    {
        return $this->title;
    }

    /**
     * @return Image|null
     */
    public function image()
    {
        return $this->image;
    }

    /**
     * @return Image|null
     */
    public function backgroundImage()
    {
        return $this->backgroundImage;
    }

    public static function builder(): BodyTemplate7Builder
    {
        $instance = new self;
        $constructor = function ($title, $image, $backgroundImage) use ($instance): BodyTemplate7 {
            $instance->title = $title;
            $instance->image = $image;
            $instance->backgroundImage = $backgroundImage;
            return $instance;
        };
        return new class($constructor) extends BodyTemplate7Builder
        {
            public function __construct(callable $constructor)
            {
                parent::__construct($constructor);
            }
        };
    }

    /**
     * @param string $title
     * @return self
     */
    public static function ofTitle(string $title): BodyTemplate7
    {
        $instance = new self;
        $instance->title = $title;
        return $instance;
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->type = self::TYPE;
        $instance->title = isset($data['title']) ? ((string) $data['title']) : null;
        $instance->image = isset($data['image']) ? Image::fromValue($data['image']) : null;
        $instance->backgroundImage = isset($data['backgroundImage']) ? Image::fromValue($data['backgroundImage']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => self::TYPE,
            'title' => $this->title,
            'image' => $this->image,
            'backgroundImage' => $this->backgroundImage
        ]);
    }
}
