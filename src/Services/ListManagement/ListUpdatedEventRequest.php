<?php

namespace Alexa\Model\Services\ListManagement;

use Alexa\Model\Request;
use \JsonSerializable;

final class ListUpdatedEventRequest extends Request implements JsonSerializable
{
    const TYPE = 'AlexaHouseholdListEvent.ListUpdated';

    /** @var ListBody|null */
    private $body = null;

    protected function __construct()
    {
        parent::__construct();
    }

    /**
     * @return ListBody|null
     */
    public function body()
    {
        return $this->body;
    }

    public static function builder(): ListUpdatedEventRequestBuilder
    {
        $instance = new self();
        $constructor = function ($body) use ($instance): ListUpdatedEventRequest {
            $instance->body = $body;
            return $instance;
        };
        return new class($constructor) extends ListUpdatedEventRequestBuilder
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
        $instance->body = isset($data['body']) ? ListBody::fromValue($data['body']) : null;
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