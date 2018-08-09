<?php

namespace Alexa\Model\Interfaces\Connections;

use Alexa\Model\Directive;
use \JsonSerializable;

final class SendRequestDirective extends Directive implements JsonSerializable
{
    const TYPE = 'Connections.SendRequest';

    /** @var string|null */
    private $name = null;

    /** @var null[] */
    private $payload = [];

    /** @var string|null */
    private $token = null;

    protected function __construct()
    {
        parent::__construct();
    }

    /**
     * @return string|null
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * @return null[]
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

    public static function builder(): SendRequestDirectiveBuilder
    {
        $instance = new self();
        $constructor = function ($name, $payload, $token) use ($instance): SendRequestDirective {
            $instance->name = $name;
            $instance->payload = $payload;
            $instance->token = $token;
            return $instance;
        };
        return new class($constructor) extends SendRequestDirectiveBuilder
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
        $instance->name = isset($data['name']) ? ((string) $data['name']) : null;
        $instance->payload = [];
        foreach ($data['payload'] as $item) {
            $element = $item;
            if ($element) {
                $instance->payload[] = $element;
            }
        }
        $instance->token = isset($data['token']) ? ((string) $data['token']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => self::TYPE,
            'name' => $this->name,
            'payload' => $this->payload,
            'token' => $this->token
        ]);
    }
}
