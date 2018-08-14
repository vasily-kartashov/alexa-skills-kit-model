<?php

namespace Alexa\Model\Interfaces\Display;

use \JsonSerializable;

final class ListTemplate2 extends Template implements JsonSerializable
{
    const TYPE = 'ListTemplate2';

    /** @var Image|null */
    private $backgroundImage = null;

    /** @var string|null */
    private $title = null;

    /** @var ListItem[] */
    private $listItems = [];

    protected function __construct()
    {
        parent::__construct();
        $this->type = self::TYPE;
    }

    /**
     * @return Image|null
     */
    public function backgroundImage()
    {
        return $this->backgroundImage;
    }

    /**
     * @return string|null
     */
    public function title()
    {
        return $this->title;
    }

    /**
     * @return ListItem[]
     */
    public function listItems()
    {
        return $this->listItems;
    }

    public static function builder(): ListTemplate2Builder
    {
        $instance = new self();
        $constructor = function ($backgroundImage, $title, $listItems) use ($instance): ListTemplate2 {
            $instance->backgroundImage = $backgroundImage;
            $instance->title = $title;
            $instance->listItems = $listItems;
            return $instance;
        };
        return new class($constructor) extends ListTemplate2Builder
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
        $instance->type = self::TYPE;
        $instance->backgroundImage = isset($data['backgroundImage']) ? Image::fromValue($data['backgroundImage']) : null;
        $instance->title = isset($data['title']) ? ((string) $data['title']) : null;
        $instance->listItems = [];
        foreach ($data['listItems'] as $item) {
            $element = isset($item) ? ListItem::fromValue($item) : null;
            if ($element !== null) {
                $instance->listItems[] = $element;
            }
        }
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => self::TYPE,
            'backgroundImage' => $this->backgroundImage,
            'title' => $this->title,
            'listItems' => $this->listItems
        ]);
    }
}
