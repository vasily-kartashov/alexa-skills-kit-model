<?php

namespace Alexa\Model\Services\LWA\Model;

abstract class ErrorBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $error = null;

    /** @var string|null */
    private $error_description = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param string $error
     * @return self
     */
    public function withError(string $error): self
    {
        $this->error = $error;
        return $this;
    }

    /**
     * @param string $error_description
     * @return self
     */
    public function withError_description(string $error_description): self
    {
        $this->error_description = $error_description;
        return $this;
    }

    public function build(): Error
    {
        return ($this->constructor)(
            $this->error,
            $this->error_description
        );
    }
}
