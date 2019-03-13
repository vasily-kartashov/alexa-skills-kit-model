<?php

namespace Alexa\Model\Services\DeviceAddress;

abstract class ErrorBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $type = null;

    /** @var string|null */
    private $message = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param string $type
     * @return self
     */
    public function withType(string $type): self
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @param string $message
     * @return self
     */
    public function withMessage(string $message): self
    {
        $this->message = $message;
        return $this;
    }

    public function build(): Error
    {
        return ($this->constructor)(
            $this->type,
            $this->message
        );
    }
}
