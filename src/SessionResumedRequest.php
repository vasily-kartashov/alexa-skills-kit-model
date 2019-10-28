<?php

namespace Alexa\Model;

use \JsonSerializable;

final class SessionResumedRequest extends Request implements JsonSerializable
{
    const TYPE = 'SessionResumedRequest';

    /** @var Cause|null */
    private $cause = null;

    protected function __construct()
    {
        parent::__construct();
        $this->type = self::TYPE;
    }

    /**
     * @return Cause|null
     */
    public function cause()
    {
        return $this->cause;
    }

    public static function builder(): SessionResumedRequestBuilder
    {
        $instance = new self;
        $constructor = function ($cause) use ($instance): SessionResumedRequest {
            $instance->cause = $cause;
            return $instance;
        };
        return new class($constructor) extends SessionResumedRequestBuilder
        {
            public function __construct(callable $constructor)
            {
                parent::__construct($constructor);
            }
        };
    }

    /**
     * @param Cause $cause
     * @return self
     */
    public static function ofCause(Cause $cause): SessionResumedRequest
    {
        $instance = new self;
        $instance->cause = $cause;
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
        $instance->cause = isset($data['cause']) ? Cause::fromValue($data['cause']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => self::TYPE,
            'cause' => $this->cause
        ]);
    }
}
