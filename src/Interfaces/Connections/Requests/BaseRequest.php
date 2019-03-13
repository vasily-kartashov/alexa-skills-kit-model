<?php

namespace Alexa\Model\Interfaces\Connections\Requests;

use \JsonSerializable;

abstract class BaseRequest implements JsonSerializable
{
    /** @var string|null */
    protected $type = null;

    /** @var string|null */
    protected $@version = null;

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
    public function @version()
    {
        return $this->@version;
    }

    /**
     * @param array $data
     * @return self|null
     */
    public static function fromValue(array $data)
    {
        if (!isset($data['@type'])) {
            return null;
        }
        switch ($data['@type']) {
            case ScheduleFoodEstablishmentReservationRequest::@TYPE:
                return ScheduleFoodEstablishmentReservationRequest::fromValue($data);
            case PrintPDFRequest::@TYPE:
                return PrintPDFRequest::fromValue($data);
            case PrintImageRequest::@TYPE:
                return PrintImageRequest::fromValue($data);
            case ScheduleTaxiReservationRequest::@TYPE:
                return ScheduleTaxiReservationRequest::fromValue($data);
            case PrintWebPageRequest::@TYPE:
                return PrintWebPageRequest::fromValue($data);
            default:
                return null;
        }
    }
}
