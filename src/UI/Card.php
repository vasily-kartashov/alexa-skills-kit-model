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

    /**
     * @param array $data
     * @return self|null
     */
    public static function fromValue(array $data)
    {
        if (!isset($data['type'])) {
            return null;
        }
        $instance = null;
        switch ($data['type']) {
            case LinkAccountCard::TYPE:
                $instance = LinkAccountCard::fromValue($data);
                break;
            case StandardCard::TYPE:
                $instance = StandardCard::fromValue($data);
                break;
            case AskForPermissionsConsentCard::TYPE:
                $instance = AskForPermissionsConsentCard::fromValue($data);
                break;
            case SimpleCard::TYPE:
                $instance = SimpleCard::fromValue($data);
                break;
        }
        if ($instance !== null) {
        }
        return $instance;
    }
}
