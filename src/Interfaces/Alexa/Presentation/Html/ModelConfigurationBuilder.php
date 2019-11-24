<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\Html;

abstract class ModelConfigurationBuilder
{
    /** @var callable */
    private $constructor;

    /** @var int|null */
    private $timeoutInSeconds = null;

    public function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param int $timeoutInSeconds
     * @return self
     */
    public function withTimeoutInSeconds(int $timeoutInSeconds): self
    {
        $this->timeoutInSeconds = $timeoutInSeconds;
        return $this;
    }

    public function build(): ModelConfiguration
    {
        return ($this->constructor)(
            $this->timeoutInSeconds
        );
    }
}
