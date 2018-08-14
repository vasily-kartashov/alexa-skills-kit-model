<?php

namespace Alexa\Model\Interfaces\Display;

use \JsonSerializable;

final class ListItem implements JsonSerializable
{
    /** @var string|null */
    private $token = null;

    /** @var Image|null */
    private $image = null;

    /** @var TextContent|null */
    private $textContent = null;

    protected function __construct()
    {
    }

    /**
     * @return string|null
     */
    public function token()
    {
        return $this->token;
    }

    /**
     * @return Image|null
     */
    public function image()
    {
        return $this->image;
    }

    /**
     * @return TextContent|null
     */
    public function textContent()
    {
        return $this->textContent;
    }

    public static function builder(): ListItemBuilder
    {
        $instance = new self();
        $constructor = function ($token, $image, $textContent) use ($instance): ListItem {
            $instance->token = $token;
            $instance->image = $image;
            $instance->textContent = $textContent;
            return $instance;
        };
        return new class($constructor) extends ListItemBuilder
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
        $instance->token = isset($data['token']) ? ((string) $data['token']) : null;
        $instance->image = isset($data['image']) ? Image::fromValue($data['image']) : null;
        $instance->textContent = isset($data['textContent']) ? TextContent::fromValue($data['textContent']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'token' => $this->token,
            'image' => $this->image,
            'textContent' => $this->textContent
        ]);
    }
}
