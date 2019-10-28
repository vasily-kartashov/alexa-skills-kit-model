<?php

namespace Alexa\Model\Interfaces\CustomInterfaceController;

use \JsonSerializable;

final class EventFilter implements JsonSerializable
{
    /** @var mixed|null */
    private $filterExpression = null;

    /** @var FilterMatchAction|null */
    private $filterMatchAction = null;

    protected function __construct()
    {
    }

    /**
     * @return mixed|null
     */
    public function filterExpression()
    {
        return $this->filterExpression;
    }

    /**
     * @return FilterMatchAction|null
     */
    public function filterMatchAction()
    {
        return $this->filterMatchAction;
    }

    public static function builder(): EventFilterBuilder
    {
        $instance = new self;
        $constructor = function ($filterExpression, $filterMatchAction) use ($instance): EventFilter {
            $instance->filterExpression = $filterExpression;
            $instance->filterMatchAction = $filterMatchAction;
            return $instance;
        };
        return new class($constructor) extends EventFilterBuilder
        {
            public function __construct(callable $constructor)
            {
                parent::__construct($constructor);
            }
        };
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->filterExpression = $data['filterExpression'];
        $instance->filterMatchAction = isset($data['filterMatchAction']) ? FilterMatchAction::fromValue($data['filterMatchAction']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'filterExpression' => $this->filterExpression,
            'filterMatchAction' => $this->filterMatchAction
        ]);
    }
}
