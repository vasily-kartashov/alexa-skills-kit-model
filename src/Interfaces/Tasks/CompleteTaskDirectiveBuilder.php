<?php

namespace Alexa\Model\Interfaces\Tasks;

use Alexa\Model\Status;

abstract class CompleteTaskDirectiveBuilder
{
    /** @var callable */
    private $constructor;

    /** @var Status|null */
    private $status = null;

    /** @var array */
    private $result = [];

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param Status $status
     * @return self
     */
    public function withStatus(Status $status): self
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @param array $result
     * @return self
     */
    public function withResult(array $result): self
    {
        $this->result = $result;
        return $this;
    }

    public function build(): CompleteTaskDirective
    {
        return ($this->constructor)(
            $this->status,
            $this->result
        );
    }
}
