<?php

namespace Alexa\Model;

abstract class ApplicationBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $applicationId = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param string $applicationId
     * @return self
     */
    public function withApplicationId(string $applicationId): self
    {
        $this->applicationId = $applicationId;
        return $this;
    }

    public function build(): Application
    {
        return ($this->constructor)(
            $this->applicationId
        );
    }
}
