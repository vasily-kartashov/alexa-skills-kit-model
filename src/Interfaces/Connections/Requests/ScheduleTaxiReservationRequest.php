<?php

namespace Alexa\Model\Interfaces\Connections\Requests;

use Alexa\Model\Interfaces\Connections\Entities\PostalAddress;
use \JsonSerializable;

final class ScheduleTaxiReservationRequest extends BaseRequest implements JsonSerializable
{
    const TYPE = 'ScheduleTaxiReservationRequest';

    /** @var string|null */
    private $pickupTime = null;

    /** @var string|null */
    private $partySize = null;

    /** @var PostalAddress|null */
    private $pickupLocation = null;

    /** @var PostalAddress|null */
    private $dropOffLocation = null;

    protected function __construct()
    {
        parent::__construct();
        $this->type = self::TYPE;
    }

    /**
     * @return string|null
     */
    public function pickupTime()
    {
        return $this->pickupTime;
    }

    /**
     * @return string|null
     */
    public function partySize()
    {
        return $this->partySize;
    }

    /**
     * @return PostalAddress|null
     */
    public function pickupLocation()
    {
        return $this->pickupLocation;
    }

    /**
     * @return PostalAddress|null
     */
    public function dropOffLocation()
    {
        return $this->dropOffLocation;
    }

    public static function builder(): ScheduleTaxiReservationRequestBuilder
    {
        $instance = new self;
        $constructor = function ($pickupTime, $partySize, $pickupLocation, $dropOffLocation) use ($instance): ScheduleTaxiReservationRequest {
            $instance->pickupTime = $pickupTime;
            $instance->partySize = $partySize;
            $instance->pickupLocation = $pickupLocation;
            $instance->dropOffLocation = $dropOffLocation;
            return $instance;
        };
        return new class($constructor) extends ScheduleTaxiReservationRequestBuilder
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
        $instance = new self;
        $instance->type = self::TYPE;
        $instance->pickupTime = isset($data['pickupTime']) ? ((string) $data['pickupTime']) : null;
        $instance->partySize = isset($data['partySize']) ? ((string) $data['partySize']) : null;
        $instance->pickupLocation = isset($data['pickupLocation']) ? PostalAddress::fromValue($data['pickupLocation']) : null;
        $instance->dropOffLocation = isset($data['dropOffLocation']) ? PostalAddress::fromValue($data['dropOffLocation']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => self::TYPE,
            'pickupTime' => $this->pickupTime,
            'partySize' => $this->partySize,
            'pickupLocation' => $this->pickupLocation,
            'dropOffLocation' => $this->dropOffLocation
        ]);
    }
}
