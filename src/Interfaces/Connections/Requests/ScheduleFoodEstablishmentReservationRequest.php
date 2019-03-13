<?php

namespace Alexa\Model\Interfaces\Connections\Requests;

use Alexa\Model\Interfaces\Connections\Entities\Restaurant;
use \JsonSerializable;

final class ScheduleFoodEstablishmentReservationRequest extends BaseRequest implements JsonSerializable
{
    const @TYPE = 'ScheduleFoodEstablishmentReservationRequest';

    /** @var string|null */
    private $startTime = null;

    /** @var string|null */
    private $partySize = null;

    /** @var Restaurant|null */
    private $restaurant = null;

    protected function __construct()
    {
        parent::__construct();
        $this->@type = self::@TYPE;
    }

    /**
     * @return string|null
     */
    public function startTime()
    {
        return $this->startTime;
    }

    /**
     * @return string|null
     */
    public function partySize()
    {
        return $this->partySize;
    }

    /**
     * @return Restaurant|null
     */
    public function restaurant()
    {
        return $this->restaurant;
    }

    public static function builder(): ScheduleFoodEstablishmentReservationRequestBuilder
    {
        $instance = new self();
        $constructor = function ($startTime, $partySize, $restaurant) use ($instance): ScheduleFoodEstablishmentReservationRequest {
            $instance->startTime = $startTime;
            $instance->partySize = $partySize;
            $instance->restaurant = $restaurant;
            return $instance;
        };
        return new class($constructor) extends ScheduleFoodEstablishmentReservationRequestBuilder
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
        $instance = new self();
        $instance->@type = self::@TYPE;
        $instance->startTime = isset($data['startTime']) ? ((string) $data['startTime']) : null;
        $instance->partySize = isset($data['partySize']) ? ((string) $data['partySize']) : null;
        $instance->restaurant = isset($data['restaurant']) ? Restaurant::fromValue($data['restaurant']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            '@type' => self::@TYPE,
            'startTime' => $this->startTime,
            'partySize' => $this->partySize,
            'restaurant' => $this->restaurant
        ]);
    }
}
