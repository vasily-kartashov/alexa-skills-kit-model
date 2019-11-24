<?php

namespace Alexa\Model\Events\SkillEvents;

use Alexa\Model\Request;
use JsonSerializable;
use \DateTime;

final class PermissionChangedRequest extends Request implements JsonSerializable
{
    const TYPE = 'AlexaSkillEvent.SkillPermissionChanged';

    /** @var PermissionBody|null */
    private $body = null;

    /** @var DateTime|null */
    private $eventCreationTime = null;

    /** @var DateTime|null */
    private $eventPublishingTime = null;

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

    /**
     * @return DateTime|null
     */
    public function eventCreationTime()
    {
        return $this->eventCreationTime;
    }

    /**
     * @return DateTime|null
     */
    public function eventPublishingTime()
    {
        return $this->eventPublishingTime;
    }

    public static function builder(): PermissionChangedRequestBuilder
    {
        $instance = new self;
        return new class($constructor = function ($body, $eventCreationTime, $eventPublishingTime) use ($instance): PermissionChangedRequest {
            $instance->body = $body;
            $instance->eventCreationTime = $eventCreationTime;
            $instance->eventPublishingTime = $eventPublishingTime;
            return $instance;
        }) extends PermissionChangedRequestBuilder {};
    }

    /**
     * @param PermissionBody $body
     * @return self
     */
    public static function ofBody(PermissionBody $body): PermissionChangedRequest
    {
        $instance = new self;
        $instance->body = $body;
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
        $instance->body = isset($data['body']) ? PermissionBody::fromValue($data['body']) : null;
        $instance->eventCreationTime = isset($data['eventCreationTime']) ? new DateTime($data['eventCreationTime']) : null;
        $instance->eventPublishingTime = isset($data['eventPublishingTime']) ? new DateTime($data['eventPublishingTime']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => self::TYPE,
            'body' => $this->body,
            'eventCreationTime' => $this->eventCreationTime,
            'eventPublishingTime' => $this->eventPublishingTime
        ]);
    }
}
