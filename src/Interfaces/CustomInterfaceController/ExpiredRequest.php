<?php

namespace Alexa\Model\Interfaces\CustomInterfaceController;

use Alexa\Model\Request;
use \JsonSerializable;

final class ExpiredRequest extends Request implements JsonSerializable
{
    const TYPE = 'CustomInterfaceController.Expired';

    /** @var string|null */
    private $token = null;

    /** @var mixed|null */
    private $expirationPayload = null;

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
     * @return mixed|null
     */
    public function expirationPayload()
    {
        return $this->expirationPayload;
    }

    public static function builder(): ExpiredRequestBuilder
    {
        $instance = new self;
        $constructor = function ($token, $expirationPayload) use ($instance): ExpiredRequest {
            $instance->token = $token;
            $instance->expirationPayload = $expirationPayload;
            return $instance;
        };
        return new class($constructor) extends ExpiredRequestBuilder
        {
            public function __construct(callable $constructor)
            {
                parent::__construct($constructor);
            }
        };
    }

    /**
     * @param string $token
     * @return self
     */
    public static function ofToken(string $token): ExpiredRequest
    {
        $instance = new self;
        $instance->token = $token;
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
        $instance->token = isset($data['token']) ? ((string) $data['token']) : null;
        $instance->expirationPayload = $data['expirationPayload'];
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => self::TYPE,
            'token' => $this->token,
            'expirationPayload' => $this->expirationPayload
        ]);
    }
}
