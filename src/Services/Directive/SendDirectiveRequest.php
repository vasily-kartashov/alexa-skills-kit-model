<?php

namespace Alexa\Model\Services\Directive;

use \JsonSerializable;

final class SendDirectiveRequest implements JsonSerializable
{
    /** @var Header|null */
    private $header = null;

    /** @var Directive|null */
    private $directive = null;

    protected function __construct()
    {
    }

    /**
     * @return Header|null
     */
    public function header()
    {
        return $this->header;
    }

    /**
     * @return Directive|null
     */
    public function directive()
    {
        return $this->directive;
    }

    public static function builder(): SendDirectiveRequestBuilder
    {
        $instance = new self();
        $constructor = function ($header, $directive) use ($instance): SendDirectiveRequest {
            $instance->header = $header;
            $instance->directive = $directive;
            return $instance;
        };
        return new class($constructor) extends SendDirectiveRequestBuilder
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
        $instance->header = isset($data['header']) ? Header::fromValue($data['header']) : null;
        $instance->directive = isset($data['directive']) ? Directive::fromValue($data['directive']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'header' => $this->header,
            'directive' => $this->directive
        ]);
    }
}
