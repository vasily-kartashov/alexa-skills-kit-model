<?php

namespace Alexa\Model\Events\SkillEvents;

use Alexa\Model\Request;
use \JsonSerializable;

final class SkillDisabledRequest extends Request implements JsonSerializable
{
    const TYPE = 'AlexaSkillEvent.SkillDisabled';

    protected function __construct()
    {
        parent::__construct();
    }

    public static function builder(): SkillDisabledRequestBuilder
    {
        $instance = new self();
        $constructor = function () use ($instance): SkillDisabledRequest {
            return $instance;
        };
        return new class($constructor) extends SkillDisabledRequestBuilder
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
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => self::TYPE
        ]);
    }
}
