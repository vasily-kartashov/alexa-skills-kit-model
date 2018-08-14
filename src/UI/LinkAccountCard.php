<?php

namespace Alexa\Model\UI;

use \JsonSerializable;

final class LinkAccountCard extends Card implements JsonSerializable
{
    const TYPE = 'LinkAccount';

    protected function __construct()
    {
        parent::__construct();
        $this->type = self::TYPE;
    }

    public static function builder(): LinkAccountCardBuilder
    {
        $instance = new self();
        $constructor = function () use ($instance): LinkAccountCard {
            return $instance;
        };
        return new class($constructor) extends LinkAccountCardBuilder
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
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => self::TYPE
        ]);
    }
}
