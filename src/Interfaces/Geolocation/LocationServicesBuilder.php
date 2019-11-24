<?php

namespace Alexa\Model\Interfaces\Geolocation;

abstract class LocationServicesBuilder
{
    /** @var callable */
    private $constructor;

    /** @var Status|null */
    private $status = null;

    /** @var Access|null */
    private $access = null;

    public function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param Status $status
     * @return self
     */
    public function withStatus(Status $status): self
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @param Access $access
     * @return self
     */
    public function withAccess(Access $access): self
    {
        $this->access = $access;
        return $this;
    }

    public function build(): LocationServices
    {
        return ($this->constructor)(
            $this->status,
            $this->access
        );
    }
}
