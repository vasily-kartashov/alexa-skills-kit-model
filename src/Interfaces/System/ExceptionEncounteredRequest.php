<?php

namespace Alexa\Model\Interfaces\System;

use Alexa\Model\Request;
use JsonSerializable;

final class ExceptionEncounteredRequest extends Request implements JsonSerializable
{
    const TYPE = 'System.ExceptionEncountered';

    /** @var Error|null */
    private $error = null;

    /** @var ErrorCause|null */
    private $cause = null;

    protected function __construct()
    {
        parent::__construct();
        $this->type = self::TYPE;
    }

    /**
     * @return Error|null
     */
    public function error()
    {
        return $this->error;
    }

    /**
     * @return ErrorCause|null
     */
    public function cause()
    {
        return $this->cause;
    }

    public static function builder(): ExceptionEncounteredRequestBuilder
    {
        $instance = new self;
        return new class($constructor = function ($error, $cause) use ($instance): ExceptionEncounteredRequest {
            $instance->error = $error;
            $instance->cause = $cause;
            return $instance;
        }) extends ExceptionEncounteredRequestBuilder {};
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->type = self::TYPE;
        $instance->error = isset($data['error']) ? Error::fromValue($data['error']) : null;
        $instance->cause = isset($data['cause']) ? ErrorCause::fromValue($data['cause']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => self::TYPE,
            'error' => $this->error,
            'cause' => $this->cause
        ]);
    }
}
