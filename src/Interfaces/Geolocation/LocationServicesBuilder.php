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

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param mixed $status
     * @return self
     */
    public function withStatus(Status $status): self
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @param mixed $access
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
