<?php

namespace Alexa\Model\Interfaces\Connections\Requests;

use Alexa\Model\Interfaces\Connections\Entities\Restaurant;

abstract class ScheduleFoodEstablishmentReservationRequestBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $startTime = null;

    /** @var string|null */
    private $partySize = null;

    /** @var Restaurant|null */
    private $restaurant = null;

    public function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param string $startTime
     * @return self
     */
    public function withStartTime(string $startTime): self
    {
        $this->startTime = $startTime;
        return $this;
    }

    /**
     * @param string $partySize
     * @return self
     */
    public function withPartySize(string $partySize): self
    {
        $this->partySize = $partySize;
        return $this;
    }

    /**
     * @param Restaurant $restaurant
     * @return self
     */
    public function withRestaurant(Restaurant $restaurant): self
    {
        $this->restaurant = $restaurant;
        return $this;
    }

    public function build(): ScheduleFoodEstablishmentReservationRequest
    {
        return ($this->constructor)(
            $this->startTime,
            $this->partySize,
            $this->restaurant
        );
    }
}
