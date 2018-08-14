<?php

namespace Alexa\Model\Interfaces\VideoApp;

use \JsonSerializable;

final class Metadata implements JsonSerializable
{
    /** @var string|null */
    private $title = null;

    /** @var string|null */
    private $subtitle = null;

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

    public static function builder(): MetadataBuilder
    {
        $instance = new self();
        $constructor = function ($title, $subtitle) use ($instance): Metadata {
            $instance->title = $title;
            $instance->subtitle = $subtitle;
            return $instance;
        };
        return new class($constructor) extends MetadataBuilder
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
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'title' => $this->title,
            'subtitle' => $this->subtitle
        ]);
    }
}
