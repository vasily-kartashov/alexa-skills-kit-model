<?php

namespace Alexa\Model\Interfaces\CustomInterfaceController;

abstract class StopEventHandlerDirectiveBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $token = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param string $token
     * @return self
     */
    public function withToken(string $token): self
    {
        $this->token = $token;
        return $this;
    }

    public function build(): StopEventHandlerDirective
    {
        return ($this->constructor)(
            $this->token
        );
    }
}
