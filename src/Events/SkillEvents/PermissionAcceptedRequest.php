<?php

namespace Alexa\Model\Events\SkillEvents;

use Alexa\Model\Request;
use \JsonSerializable;

final class PermissionAcceptedRequest extends Request implements JsonSerializable
{
    const TYPE = 'AlexaSkillEvent.SkillPermissionAccepted';

    /** @var PermissionBody|null */
    private $body = null;

    protected function __construct()
    {
        parent::__construct();
        $this->type = self::TYPE;
    }

    /**
     * @return PermissionBody|null
     */
    public function body()
    {
        return $this->body;
    }

    public static function builder(): PermissionAcceptedRequestBuilder
    {
        $instance = new self();
        $constructor = function ($body) use ($instance): PermissionAcceptedRequest {
            $instance->body = $body;
            return $instance;
        };
        return new class($constructor) extends PermissionAcceptedRequestBuilder
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
        $instance->body = isset($data['body']) ? PermissionBody::fromValue($data['body']) : null;
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
