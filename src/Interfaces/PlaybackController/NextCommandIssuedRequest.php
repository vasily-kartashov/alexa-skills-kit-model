<?php

namespace Alexa\Model\Interfaces\PlaybackController;

use Alexa\Model\Request;
use JsonSerializable;

final class NextCommandIssuedRequest extends Request implements JsonSerializable
{
    const TYPE = 'PlaybackController.NextCommandIssued';

    protected function __construct()
    {
        parent::__construct();
        $this->type = self::TYPE;
    }

    public static function empty(): NextCommandIssuedRequest
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
