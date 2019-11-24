<?php

namespace Alexa\Model\UI;

use JsonSerializable;

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
        $instance = new self;
        return new class($constructor = function ($smallImageUrl, $largeImageUrl) use ($instance): Image {
            $instance->smallImageUrl = $smallImageUrl;
            $instance->largeImageUrl = $largeImageUrl;
            return $instance;
        }) extends ImageBuilder {};
    }

    /**
     * @param string $smallImageUrl
     * @return self
     */
    public static function ofSmallImageUrl(string $smallImageUrl): Image
    {
        $instance = new self;
        $instance->smallImageUrl = $smallImageUrl;
        return $instance;
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
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
