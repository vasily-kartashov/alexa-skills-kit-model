<?php

namespace Alexa\Model\Interfaces\PlaybackController;

use Alexa\Model\Request;
use JsonSerializable;

final class PreviousCommandIssuedRequest extends Request implements JsonSerializable
{
    const TYPE = 'PlaybackController.PreviousCommandIssued';

    protected function __construct()
    {
        parent::__construct();
        $this->type = self::TYPE;
    }

    public static function empty(): PreviousCommandIssuedRequest
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
