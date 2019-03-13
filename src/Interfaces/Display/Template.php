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
            case ListTemplate2::TYPE:
                $instance = ListTemplate2::fromValue($data);
                break;
            case ListTemplate1::TYPE:
                $instance = ListTemplate1::fromValue($data);
                break;
            case BodyTemplate7::TYPE:
                $instance = BodyTemplate7::fromValue($data);
                break;
            case BodyTemplate6::TYPE:
                $instance = BodyTemplate6::fromValue($data);
                break;
            case BodyTemplate3::TYPE:
                $instance = BodyTemplate3::fromValue($data);
                break;
            case BodyTemplate2::TYPE:
                $instance = BodyTemplate2::fromValue($data);
                break;
            case BodyTemplate1::TYPE:
                $instance = BodyTemplate1::fromValue($data);
                break;
        }
        if ($instance !== null) {
            if (isset($data['token'])) {
                $instance->token = $data['token'];
            }
            if (isset($data['backButton'])) {
                $instance->backButton = $data['backButton'];
            }
        }
        return $instance;
    }
}
