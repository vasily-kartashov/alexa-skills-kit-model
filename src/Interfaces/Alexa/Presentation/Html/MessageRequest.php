<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\Html;

use Alexa\Model\Request;
use JsonSerializable;

final class MessageRequest extends Request implements JsonSerializable
{
    const TYPE = 'Alexa.Presentation.html.Message';

    /** @var mixed|null */
    private $message = null;

    protected function __construct()
    {
        parent::__construct();
        $this->type = self::TYPE;
    }

    /**
     * @return mixed|null
     */
    public function message()
    {
        return $this->message;
    }

    public static function builder(): MessageRequestBuilder
    {
        $instance = new self;
        return new class($constructor = function ($message) use ($instance): MessageRequest {
            $instance->message = $message;
            return $instance;
        }) extends MessageRequestBuilder {};
    }

    /**
     * @param mixed $message
     * @return self
     */
    public static function ofMessage($message): MessageRequest
    {
        $instance = new self;
        $instance->message = $message;
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
        $instance->message = $data['message'];
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => self::TYPE,
            'message' => $this->message
        ]);
    }
}
