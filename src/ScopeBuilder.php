<?php

namespace Alexa\Model;

abstract class ScopeBuilder
{
    /** @var callable */
    private $constructor;

    /** @var PermissionStatus|null */
    private $status = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param mixed $status
     * @return self
     */
    public function withStatus(PermissionStatus $status): self
    {
        $this->status = $status;
        return $this;
    }

    public function build(): Scope
    {
        return ($this->constructor)(
            $this->status
        );
    }
}
