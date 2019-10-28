<?php

namespace Alexa\Model\Interfaces\CustomInterfaceController;

abstract class EventFilterBuilder
{
    /** @var callable */
    private $constructor;

    /** @var mixed|null */
    private $filterExpression = null;

    /** @var FilterMatchAction|null */
    private $filterMatchAction = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param mixed $filterExpression
     * @return self
     */
    public function withFilterExpression($filterExpression): self
    {
        $this->filterExpression = $filterExpression;
        return $this;
    }

    /**
     * @param FilterMatchAction $filterMatchAction
     * @return self
     */
    public function withFilterMatchAction(FilterMatchAction $filterMatchAction): self
    {
        $this->filterMatchAction = $filterMatchAction;
        return $this;
    }

    public function build(): EventFilter
    {
        return ($this->constructor)(
            $this->filterExpression,
            $this->filterMatchAction
        );
    }
}
