<?php

namespace Alexa\Model\Interfaces\Navigation\Assistance;

use Alexa\Model\Directive;
use \JsonSerializable;

final class AnnounceRoadRegulation extends Directive implements JsonSerializable
{
    const TYPE = 'Navigation.Assistance.AnnounceRoadRegulation';

    protected function __construct()
    {
        parent::__construct();
        $this->type = self::TYPE;
    }

    public static function empty(): AnnounceRoadRegulation
    {
        return new self;
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
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
