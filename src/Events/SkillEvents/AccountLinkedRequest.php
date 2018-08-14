<?php

namespace Alexa\Model\Events\SkillEvents;

use Alexa\Model\Request;
use \JsonSerializable;

final class AccountLinkedRequest extends Request implements JsonSerializable
{
    const TYPE = 'AlexaSkillEvent.SkillAccountLinked';

    /** @var AccountLinkedBody|null */
    private $body = null;

    protected function __construct()
    {
        parent::__construct();
        $this->type = self::TYPE;
    }

    /**
     * @return AccountLinkedBody|null
     */
    public function body()
    {
        return $this->body;
    }

    public static function builder(): AccountLinkedRequestBuilder
    {
        $instance = new self();
        $constructor = function ($body) use ($instance): AccountLinkedRequest {
            $instance->body = $body;
            return $instance;
        };
        return new class($constructor) extends AccountLinkedRequestBuilder
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
        $instance->body = isset($data['body']) ? AccountLinkedBody::fromValue($data['body']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => self::TYPE,
            'body' => $this->body
        ]);
    }
}
