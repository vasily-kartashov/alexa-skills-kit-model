<?php

namespace Alexa\Model\Interfaces\Connections\Requests;

use \JsonSerializable;

final class PrintImageRequest extends BaseRequest implements JsonSerializable
{
    const TYPE = 'PrintImageRequest';

    /** @var string|null */
    private $title = null;

    /** @var string|null */
    private $url = null;

    /** @var string|null */
    private $description = null;

    /** @var string|null */
    private $imageType = null;

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
     * @return string|null
     */
    public function url()
    {
        return $this->url;
    }

    /**
     * @return string|null
     */
    public function description()
    {
        return $this->description;
    }

    /**
     * @return string|null
     */
    public function imageType()
    {
        return $this->imageType;
    }

    public static function builder(): PrintImageRequestBuilder
    {
        $instance = new self;
        $constructor = function ($title, $url, $description, $imageType) use ($instance): PrintImageRequest {
            $instance->title = $title;
            $instance->url = $url;
            $instance->description = $description;
            $instance->imageType = $imageType;
            return $instance;
        };
        return new class($constructor) extends PrintImageRequestBuilder
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
    public static function ofTitle(string $title): PrintImageRequest
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
        $instance->url = isset($data['url']) ? ((string) $data['url']) : null;
        $instance->description = isset($data['description']) ? ((string) $data['description']) : null;
        $instance->imageType = isset($data['imageType']) ? ((string) $data['imageType']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => self::TYPE,
            'title' => $this->title,
            'url' => $this->url,
            'description' => $this->description,
            'imageType' => $this->imageType
        ]);
    }
}
