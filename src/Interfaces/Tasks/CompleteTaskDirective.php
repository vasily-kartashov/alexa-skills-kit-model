<?php

namespace Alexa\Model\Interfaces\Tasks;

use Alexa\Model\Directive;
use Alexa\Model\Status;
use JsonSerializable;

final class CompleteTaskDirective extends Directive implements JsonSerializable
{
    const TYPE = 'Tasks.CompleteTask';

    /** @var Status|null */
    private $status = null;

    /** @var array */
    private $result = [];

    protected function __construct()
    {
        parent::__construct();
        $this->type = self::TYPE;
    }

    /**
     * @return Status|null
     */
    public function status()
    {
        return $this->status;
    }

    /**
     * @return array
     */
    public function result()
    {
        return $this->result;
    }

    public static function builder(): CompleteTaskDirectiveBuilder
    {
        $instance = new self;
        return new class($constructor = function ($status, $result) use ($instance): CompleteTaskDirective {
            $instance->status = $status;
            $instance->result = $result;
            return $instance;
        }) extends CompleteTaskDirectiveBuilder {};
    }

    /**
     * @param Status $status
     * @return self
     */
    public static function ofStatus(Status $status): CompleteTaskDirective
    {
        $instance = new self;
        $instance->status = $status;
        return $instance;
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->type = self::TYPE;
        $instance->status = isset($data['status']) ? Status::fromValue($data['status']) : null;
        $instance->result = [];
        if (isset($data['result'])) {
            foreach ($data['result'] as $item) {
                $element = $item;
                if ($element !== null) {
                    $instance->result[] = $element;
                }
            }
        }
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => self::TYPE,
            'status' => $this->status,
            'result' => $this->result
        ]);
    }
}
