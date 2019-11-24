<?php

namespace Alexa\Model\UI;

use JsonSerializable;

final class SimpleCard extends Card implements JsonSerializable
{
    const TYPE = 'Simple';

    /** @var string|null */
    private $title = null;

    /** @var string|null */
    private $content = null;

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
    public function content()
    {
        return $this->content;
    }

    public static function builder(): SimpleCardBuilder
    {
        $instance = new self;
        return new class($constructor = function ($title, $content) use ($instance): SimpleCard {
            $instance->title = $title;
            $instance->content = $content;
            return $instance;
        }) extends SimpleCardBuilder {};
    }

    /**
     * @param string $title
     * @return self
     */
    public static function ofTitle(string $title): SimpleCard
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
        $instance->content = isset($data['content']) ? ((string) $data['content']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => self::TYPE,
            'title' => $this->title,
            'content' => $this->content
        ]);
    }
}
