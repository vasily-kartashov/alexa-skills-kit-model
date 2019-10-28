<?php

namespace Alexa\Model\Interfaces\Connections;

use Alexa\Model\Request;
use \JsonSerializable;

final class ConnectionsResponse extends Request implements JsonSerializable
{
    const TYPE = 'Connections.Response';

    /** @var ConnectionsStatus|null */
    private $status = null;

    /** @var string|null */
    private $name = null;

    /** @var array */
    private $payload = [];

    /** @var string|null */
    private $token = null;

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

    /**
     * @return string|null
     */
    public function token()
    {
        return $this->token;
    }

    public static function builder(): ConnectionsResponseBuilder
    {
        $instance = new self;
        $constructor = function ($status, $name, $payload, $token) use ($instance): ConnectionsResponse {
            $instance->status = $status;
            $instance->name = $name;
            $instance->payload = $payload;
            $instance->token = $token;
            return $instance;
        };
        return new class($constructor) extends ConnectionsResponseBuilder
        {
            public function __construct(callable $constructor)
            {
                parent::__construct($constructor);
            }
        };
    }

    /**
     * @param ConnectionsStatus $status
     * @return self
     */
    public static function ofStatus(ConnectionsStatus $status): ConnectionsResponse
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
        $instance->status = isset($data['status']) ? ConnectionsStatus::fromValue($data['status']) : null;
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
        $instance->token = isset($data['token']) ? ((string) $data['token']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => self::TYPE,
            'status' => $this->status,
            'name' => $this->name,
            'payload' => $this->payload,
            'token' => $this->token
        ]);
    }
}
