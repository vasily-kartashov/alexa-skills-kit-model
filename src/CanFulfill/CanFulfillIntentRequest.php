<?php

namespace Alexa\Model\CanFulfill;

use Alexa\Model\DialogState;
use Alexa\Model\Intent;
use Alexa\Model\Request;
use \JsonSerializable;

final class CanFulfillIntentRequest extends Request implements JsonSerializable
{
    const TYPE = 'CanFulfillIntentRequest';

    /** @var DialogState|null */
    private $dialogState = null;

    /** @var Intent|null */
    private $intent = null;

    protected function __construct()
    {
        parent::__construct();
        $this->type = self::TYPE;
    }

    /**
     * @return DialogState|null
     */
    public function dialogState()
    {
        return $this->dialogState;
    }

    /**
     * @return Intent|null
     */
    public function intent()
    {
        return $this->intent;
    }

    public static function builder(): CanFulfillIntentRequestBuilder
    {
        $instance = new self();
        $constructor = function ($dialogState, $intent) use ($instance): CanFulfillIntentRequest {
            $instance->dialogState = $dialogState;
            $instance->intent = $intent;
            return $instance;
        };
        return new class($constructor) extends CanFulfillIntentRequestBuilder
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
        $instance->dialogState = isset($data['dialogState']) ? DialogState::fromValue($data['dialogState']) : null;
        $instance->intent = isset($data['intent']) ? Intent::fromValue($data['intent']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => self::TYPE,
            'dialogState' => $this->dialogState,
            'intent' => $this->intent
        ]);
    }
}
