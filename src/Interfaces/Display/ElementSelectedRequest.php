<?php

namespace Alexa\Model\Interfaces\Display;

use Alexa\Model\Request;
use \JsonSerializable;

final class ElementSelectedRequest extends Request implements JsonSerializable
{
    const TYPE = 'Display.ElementSelected';

    /** @var string|null */
    private $token = null;

    protected function __construct()
    {
        parent::__construct();
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
        $instance = new self();
        $constructor = function ($token) use ($instance): ElementSelectedRequest {
            $instance->token = $token;
            return $instance;
        };
        return new class($constructor) extends ElementSelectedRequestBuilder
        {
            public function __construct(callable $constructor)
            {
                parent::__construct($constructor);
            }
        };
    }

    public static function fromValue(array $data)
    {
        $instance = new self();
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
