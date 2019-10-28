<?php

namespace Alexa\Model\Services\ReminderManagement;

use \JsonSerializable;

final class AlertInfoSpokenInfo implements JsonSerializable
{
    /** @var SpokenText[] */
    private $content = [];

    protected function __construct()
    {
    }

    /**
     * @return SpokenText[]
     */
    public function content()
    {
        return $this->content;
    }

    public static function builder(): AlertInfoSpokenInfoBuilder
    {
        $instance = new self;
        $constructor = function ($content) use ($instance): AlertInfoSpokenInfo {
            $instance->content = $content;
            return $instance;
        };
        return new class($constructor) extends AlertInfoSpokenInfoBuilder
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
        $instance = new self;
        $instance->content = [];
        if (isset($data['content'])) {
            foreach ($data['content'] as $item) {
                $element = isset($item) ? SpokenText::fromValue($item) : null;
                if ($element !== null) {
                    $instance->content[] = $element;
                }
            }
        }
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'content' => $this->content
        ]);
    }
}
