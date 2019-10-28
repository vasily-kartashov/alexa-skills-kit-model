<?php

namespace Alexa\Model\Interfaces\CustomInterfaceController;

use Alexa\Model\Directive;
use \JsonSerializable;

final class SendDirectiveDirective extends Directive implements JsonSerializable
{
    const TYPE = 'CustomInterfaceController.SendDirective';

    /** @var Header|null */
    private $header = null;

    /** @var mixed|null */
    private $payload = null;

    /** @var Endpoint|null */
    private $endpoint = null;

    protected function __construct()
    {
        parent::__construct();
        $this->type = self::TYPE;
    }

    /**
     * @return Header|null
     */
    public function header()
    {
        return $this->header;
    }

    /**
     * @return mixed|null
     */
    public function payload()
    {
        return $this->payload;
    }

    /**
     * @return Endpoint|null
     */
    public function endpoint()
    {
        return $this->endpoint;
    }

    public static function builder(): SendDirectiveDirectiveBuilder
    {
        $instance = new self;
        $constructor = function ($header, $payload, $endpoint) use ($instance): SendDirectiveDirective {
            $instance->header = $header;
            $instance->payload = $payload;
            $instance->endpoint = $endpoint;
            return $instance;
        };
        return new class($constructor) extends SendDirectiveDirectiveBuilder
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
        $instance->header = isset($data['header']) ? Header::fromValue($data['header']) : null;
        $instance->payload = $data['payload'];
        $instance->endpoint = isset($data['endpoint']) ? Endpoint::fromValue($data['endpoint']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => self::TYPE,
            'header' => $this->header,
            'payload' => $this->payload,
            'endpoint' => $this->endpoint
        ]);
    }
}
