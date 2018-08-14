<?php

namespace Alexa\Model\Events\SkillEvents;

use Alexa\Model\Request;
use \JsonSerializable;

final class SkillEnabledRequest extends Request implements JsonSerializable
{
    const TYPE = 'AlexaSkillEvent.SkillEnabled';

    protected function __construct()
    {
        parent::__construct();
        $this->type = self::TYPE;
    }

    public static function builder(): SkillEnabledRequestBuilder
    {
        $instance = new self();
        $constructor = function () use ($instance): SkillEnabledRequest {
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
        $instance = new self();
        $instance->type = self::TYPE;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => self::TYPE
        ]);
    }
}
