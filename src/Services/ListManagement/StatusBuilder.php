<?php

namespace Alexa\Model\Services\ListManagement;

abstract class StatusBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $url = null;

    /** @var ListItemState|null */
    private $status = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    public function withUrl(string $url): self
    {
        $this->url = $url;
        return $this;
    }

    public function withStatus(ListItemState $status): self
    {
        $this->status = $status;
        return $this;
    }

    public function build(): Status
    {
        return ($this->constructor)(
            $this->url,
            $this->status
        );
    }
}
