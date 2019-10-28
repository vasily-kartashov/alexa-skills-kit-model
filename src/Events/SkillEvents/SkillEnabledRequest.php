<?php

namespace Alexa\Model\Events\SkillEvents;

use Alexa\Model\Request;
use \DateTime;
use \JsonSerializable;

final class SkillEnabledRequest extends Request implements JsonSerializable
{
    const TYPE = 'AlexaSkillEvent.SkillEnabled';

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

    public static function builder(): SkillEnabledRequestBuilder
    {
        $instance = new self;
        $constructor = function ($eventCreationTime, $eventPublishingTime) use ($instance): SkillEnabledRequest {
            $instance->eventCreationTime = $eventCreationTime;
            $instance->eventPublishingTime = $eventPublishingTime;
            return $instance;
        };
        return new class($constructor) extends SkillEnabledRequestBuilder
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
        $instance->eventCreationTime = isset($data['eventCreationTime']) ? new DateTime($data['eventCreationTime']) : null;
        $instance->eventPublishingTime = isset($data['eventPublishingTime']) ? new DateTime($data['eventPublishingTime']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => self::TYPE,
            'eventCreationTime' => $this->eventCreationTime,
            'eventPublishingTime' => $this->eventPublishingTime
        ]);
    }
}
