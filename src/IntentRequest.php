<?php

namespace Alexa\Model;

use \JsonSerializable;

final class IntentRequest extends Request implements JsonSerializable
{
    const TYPE = 'IntentRequest';

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

    public static function builder(): IntentRequestBuilder
    {
        $instance = new self;
        $constructor = function ($dialogState, $intent) use ($instance): IntentRequest {
            $instance->dialogState = $dialogState;
            $instance->intent = $intent;
            return $instance;
        };
        return new class($constructor) extends IntentRequestBuilder
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
