<?php

namespace Alexa\Model;

abstract class LaunchRequestBuilder
{
    /** @var callable */
    private $constructor;

    /** @var Task|null */
    private $task = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param Task $task
     * @return self
     */
    public function withTask(Task $task): self
    {
        $this->task = $task;
        return $this;
    }

    public function build(): LaunchRequest
    {
        return ($this->constructor)(
            $this->task
        );
    }
}
