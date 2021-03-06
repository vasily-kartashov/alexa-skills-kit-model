<?php

namespace Alexa\Model\Interfaces\Connections;

use Alexa\Model\Request;
use JsonSerializable;

final class ConnectionsRequest extends Request implements JsonSerializable
{
    const TYPE = 'Connections.Request';

    /** @var string|null */
    private $name = null;

    /** @var array */
    private $payload = [];

    protected function __construct()
    {
        parent::__construct();
        $this->type = self::TYPE;
    }

    /**
     * @return string|null
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * @return array
     */
    public function payload()
    {
        return $this->payload;
    }

    public static function builder(): ConnectionsRequestBuilder
    {
        $instance = new self;
        return new class($constructor = function ($name, $payload) use ($instance): ConnectionsRequest {
            $instance->name = $name;
            $instance->payload = $payload;
            return $instance;
        }) extends ConnectionsRequestBuilder {};
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->type = self::TYPE;
        $instance->name = isset($data['name']) ? ((string) $data['name']) : null;
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
            'name' => $this->name,
            'payload' => $this->payload
        ]);
    }
}
