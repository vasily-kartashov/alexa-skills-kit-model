<?php

namespace Alexa\Model\Interfaces\Connections\Requests;

use \JsonSerializable;

abstract class BaseRequest implements JsonSerializable
{
    /** @var string|null */
    protected $type = null;

    /** @var string|null */
    protected $version = null;

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
    public function version()
    {
        return $this->version;
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
        $instance = null;
        switch ($data['@type']) {
            case ScheduleFoodEstablishmentReservationRequest::TYPE:
                $instance = ScheduleFoodEstablishmentReservationRequest::fromValue($data);
                break;
            case PrintPDFRequest::TYPE:
                $instance = PrintPDFRequest::fromValue($data);
                break;
            case PrintImageRequest::TYPE:
                $instance = PrintImageRequest::fromValue($data);
                break;
            case ScheduleTaxiReservationRequest::TYPE:
                $instance = ScheduleTaxiReservationRequest::fromValue($data);
                break;
            case PrintWebPageRequest::TYPE:
                $instance = PrintWebPageRequest::fromValue($data);
                break;
        }
        if ($instance !== null) {
            if (isset($data['@version'])) {
                $instance->version = $data['@version'];
            }
        }
        return $instance;
    }
}
