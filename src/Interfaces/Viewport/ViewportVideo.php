<?php

namespace Alexa\Model\Interfaces\Viewport;

use Alexa\Model\Interfaces\Viewport\Video\Codecs;
use JsonSerializable;

final class ViewportVideo implements JsonSerializable
{
    /** @var Codecs[] */
    private $codecs = [];

    protected function __construct()
    {
    }

    /**
     * @return Codecs[]
     */
    public function codecs()
    {
        return $this->codecs;
    }

    public static function builder(): ViewportVideoBuilder
    {
        $instance = new self;
        return new class($constructor = function ($codecs) use ($instance): ViewportVideo {
            $instance->codecs = $codecs;
            return $instance;
        }) extends ViewportVideoBuilder {};
    }

    /**
     * @param array $codecs
     * @return self
     */
    public static function ofCodecs(array $codecs): ViewportVideo
    {
        $instance = new self;
        $instance->codecs = $codecs;
        return $instance;
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->codecs = [];
        if (isset($data['codecs'])) {
            foreach ($data['codecs'] as $item) {
                $element = isset($item) ? Codecs::fromValue($item) : null;
                if ($element !== null) {
                    $instance->codecs[] = $element;
                }
            }
        }
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'codecs' => $this->codecs
        ]);
    }
}
