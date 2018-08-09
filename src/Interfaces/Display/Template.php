<?php

namespace Alexa\Model\Interfaces\Display;

use \JsonSerializable;

abstract class Template implements JsonSerializable
{
    /** @var string|null */
    protected $type = null;

    /** @var string|null */
    protected $token = null;

    /** @var BackButtonBehavior|null */
    protected $backButton = null;

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
     * @return string|null
     */
    public function token()
    {
        return $this->token;
    }

    /**
     * @return BackButtonBehavior|null
     */
    public function backButton()
    {
        return $this->backButton;
    }

    public static function fromValue(array $data)
    {
        switch ($data['type']) {
            case ListTemplate2::TYPE:
                return ListTemplate2::fromValue($data);
            case ListTemplate1::TYPE:
                return ListTemplate1::fromValue($data);
            case BodyTemplate7::TYPE:
                return BodyTemplate7::fromValue($data);
            case BodyTemplate6::TYPE:
                return BodyTemplate6::fromValue($data);
            case BodyTemplate3::TYPE:
                return BodyTemplate3::fromValue($data);
            case BodyTemplate2::TYPE:
                return BodyTemplate2::fromValue($data);
            case BodyTemplate1::TYPE:
                return BodyTemplate1::fromValue($data);
            default:
                return null;
        }
    }
}
