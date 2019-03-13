<?php

namespace Alexa\Model;

use Alexa\Model\SLU\EntityResolution\Resolutions;

abstract class SlotBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $name = null;

    /** @var string|null */
    private $value = null;

    /** @var SlotConfirmationStatus|null */
    private $confirmationStatus = null;

    /** @var Resolutions|null */
    private $resolutions = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param mixed $name
     * @return self
     */
    public function withName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param mixed $value
     * @return self
     */
    public function withValue(string $value): self
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @param mixed $confirmationStatus
     * @return self
     */
    public function withConfirmationStatus(SlotConfirmationStatus $confirmationStatus): self
    {
        $this->confirmationStatus = $confirmationStatus;
        return $this;
    }

    /**
     * @param mixed $resolutions
     * @return self
     */
    public function withResolutions(Resolutions $resolutions): self
    {
        $this->resolutions = $resolutions;
        return $this;
    }

    public function build(): Slot
    {
        return ($this->constructor)(
            $this->name,
            $this->value,
            $this->confirmationStatus,
            $this->resolutions
        );
    }
}
