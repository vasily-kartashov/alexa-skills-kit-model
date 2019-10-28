<?php

namespace Alexa\Model;

use \JsonSerializable;

final class ConnectionCompleted extends Cause implements JsonSerializable
{
    const TYPE = 'ConnectionCompleted';

    /** @var string|null */
    private $token = null;

    /** @var Status|null */
    private $status = null;

    /** @var mixed|null */
    private $result = null;

    protected function __construct()
    {
        parent::__construct();
        $this->type = self::TYPE;
    }

    /**
     * @return string|null
     */
    public function token()
    {
        return $this->token;
    }

    /**
     * @return Status|null
     */
    public function status()
    {
        return $this->status;
    }

    /**
     * @return mixed|null
     */
    public function result()
    {
        return $this->result;
    }

    public static function builder(): ConnectionCompletedBuilder
    {
        $instance = new self();
        $constructor = function ($token, $status, $result) use ($instance): ConnectionCompleted {
            $instance->token = $token;
            $instance->status = $status;
            $instance->result = $result;
            return $instance;
        };
        return new class($constructor) extends ConnectionCompletedBuilder
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
        $instance = new self();
        $instance->type = self::TYPE;
        $instance->token = isset($data['token']) ? ((string) $data['token']) : null;
        $instance->status = isset($data['status']) ? Status::fromValue($data['status']) : null;
        $instance->result = $data['result'];
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => self::TYPE,
            'token' => $this->token,
            'status' => $this->status,
            'result' => $this->result
        ]);
    }
}
