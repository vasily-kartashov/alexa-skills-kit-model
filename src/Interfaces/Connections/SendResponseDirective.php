<?php

namespace Alexa\Model\Interfaces\Connections;

use Alexa\Model\Directive;
use \JsonSerializable;

final class SendResponseDirective extends Directive implements JsonSerializable
{
    const TYPE = 'Connections.SendResponse';

    /** @var ConnectionsStatus|null */
    private $status = null;

    /** @var array */
    private $payload = [];

    protected function __construct()
    {
        parent::__construct();
        $this->type = self::TYPE;
    }

    /**
     * @return ConnectionsStatus|null
     */
    public function status()
    {
        return $this->status;
    }

    /**
     * @return array
     */
    public function payload()
    {
        return $this->payload;
    }

    public static function builder(): SendResponseDirectiveBuilder
    {
        $instance = new self;
        $constructor = function ($status, $payload) use ($instance): SendResponseDirective {
            $instance->status = $status;
            $instance->payload = $payload;
            return $instance;
        };
        return new class($constructor) extends SendResponseDirectiveBuilder
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
        $instance->type = self::TYPE;
        $instance->status = isset($data['status']) ? ConnectionsStatus::fromValue($data['status']) : null;
        $instance->payload = [];
        if (isset($data['payload'])) {
            foreach ($data['payload'] as $item) {
                $element = $item;
                if ($element !== null) {
                    $instance->payload[] = $element;
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
            'payload' => $this->payload
        ]);
    }
}
