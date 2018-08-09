<?php

namespace Alexa\Model\UI;

use \JsonSerializable;

final class Image implements JsonSerializable
{
    /** @var string|null */
    private $smallImageUrl = null;

    /** @var string|null */
    private $largeImageUrl = null;

    protected function __construct()
    {
    }

    /**
     * @return string|null
     */
    public function smallImageUrl()
    {
        return $this->smallImageUrl;
    }

    /**
     * @return string|null
     */
    public function largeImageUrl()
    {
        return $this->largeImageUrl;
    }

    public static function builder(): ImageBuilder
    {
        $instance = new self();
        $constructor = function ($smallImageUrl, $largeImageUrl) use ($instance): Image {
            $instance->smallImageUrl = $smallImageUrl;
            $instance->largeImageUrl = $largeImageUrl;
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

    public static function fromValue(array $data)
    {
        $instance = new self();
        $instance->smallImageUrl = isset($data['smallImageUrl']) ? ((string) $data['smallImageUrl']) : null;
        $instance->largeImageUrl = isset($data['largeImageUrl']) ? ((string) $data['largeImageUrl']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'smallImageUrl' => $this->smallImageUrl,
            'largeImageUrl' => $this->largeImageUrl
        ]);
    }
}
