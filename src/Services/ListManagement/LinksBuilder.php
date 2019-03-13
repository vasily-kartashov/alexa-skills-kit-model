<?php

namespace Alexa\Model\Services\ListManagement;

abstract class LinksBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $next = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param mixed $next
     * @return self
     */
    public function withNext(string $next): self
    {
        $this->next = $next;
        return $this;
    }

    public function build(): Links
    {
        return ($this->constructor)(
            $this->next
        );
    }
}
