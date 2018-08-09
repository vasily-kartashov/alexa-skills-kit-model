<?php

namespace Alexa\Model\Interfaces\Display;

use \JsonSerializable;

final class BodyTemplate6 extends Template implements JsonSerializable
{
    const TYPE = 'BodyTemplate6';

    /** @var Image|null */
    private $backgroundImage = null;

    /** @var TextContent|null */
    private $textContent = null;

    /** @var Image|null */
    private $image = null;

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
     * @return TextContent|null
     */
    public function textContent()
    {
        return $this->textContent;
    }

    /**
     * @return Image|null
     */
    public function image()
    {
        return $this->image;
    }

    public static function builder(): BodyTemplate6Builder
    {
        $instance = new self();
        $constructor = function ($backgroundImage, $textContent, $image) use ($instance): BodyTemplate6 {
            $instance->backgroundImage = $backgroundImage;
            $instance->textContent = $textContent;
            $instance->image = $image;
            return $instance;
        };
        return new class($constructor) extends BodyTemplate6Builder
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
        $instance->textContent = isset($data['textContent']) ? TextContent::fromValue($data['textContent']) : null;
        $instance->image = isset($data['image']) ? Image::fromValue($data['image']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => self::TYPE,
            'backgroundImage' => $this->backgroundImage,
            'textContent' => $this->textContent,
            'image' => $this->image
        ]);
    }
}