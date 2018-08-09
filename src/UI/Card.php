<?php

namespace Alexa\Model\UI;

use \JsonSerializable;

abstract class Card implements JsonSerializable
{
    /** @var string|null */
    protected $type = null;

    protected function __construct()
    {
    }

    /**
     * @return string|null
     */
    public function type()
    {
        return $this->type;
    }

    public static function fromValue(array $data)
    {
        if (!isset($data['type'])) {
            return null;
        }
        switch ($data['type']) {
            case LinkAccountCard::TYPE:
                return LinkAccountCard::fromValue($data);
            case StandardCard::TYPE:
                return StandardCard::fromValue($data);
            case AskForPermissionsConsentCard::TYPE:
                return AskForPermissionsConsentCard::fromValue($data);
            case SimpleCard::TYPE:
                return SimpleCard::fromValue($data);
            default:
                return null;
        }
    }
}
