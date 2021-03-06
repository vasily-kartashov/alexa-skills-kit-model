<?php

namespace Alexa\Model\Interfaces\Display;

use Alexa\Model\Request;
use JsonSerializable;

final class ElementSelectedRequest extends Request implements JsonSerializable
{
    const TYPE = 'Display.ElementSelected';

    /** @var string|null */
    private $token = null;

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

    public static function builder(): ElementSelectedRequestBuilder
    {
        $instance = new self;
        return new class($constructor = function ($token) use ($instance): ElementSelectedRequest {
            $instance->token = $token;
            return $instance;
        }) extends ElementSelectedRequestBuilder {};
    }

    /**
     * @param string $token
     * @return self
     */
    public static function ofToken(string $token): ElementSelectedRequest
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
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => self::TYPE,
            'token' => $this->token
        ]);
    }
}
