<?php

namespace Alexa\Model\Interfaces\Connections;

use Alexa\Model\Directive;
use JsonSerializable;

final class SendRequestDirective extends Directive implements JsonSerializable
{
    const TYPE = 'Connections.SendRequest';

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

    public static function builder(): SendRequestDirectiveBuilder
    {
        $instance = new self;
        return new class($constructor = function ($name, $payload, $token) use ($instance): SendRequestDirective {
            $instance->name = $name;
            $instance->payload = $payload;
            $instance->token = $token;
            return $instance;
        }) extends SendRequestDirectiveBuilder {};
    }

    /**
     * @param string $name
     * @return self
     */
    public static function ofName(string $name): SendRequestDirective
    {
        $instance = new self;
        $instance->name = $name;
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
            'name' => $this->name,
            'payload' => $this->payload,
            'token' => $this->token
        ]);
    }
}
