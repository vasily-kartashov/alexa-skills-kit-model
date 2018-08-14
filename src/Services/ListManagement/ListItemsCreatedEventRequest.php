<?php

namespace Alexa\Model\Services\ListManagement;

use Alexa\Model\Request;
use \JsonSerializable;

final class ListItemsCreatedEventRequest extends Request implements JsonSerializable
{
    const TYPE = 'AlexaHouseholdListEvent.ItemsCreated';

    /** @var ListItemBody|null */
    private $body = null;

    protected function __construct()
    {
        parent::__construct();
        $this->type = self::TYPE;
    }

    /**
     * @return ListItemBody|null
     */
    public function body()
    {
        return $this->body;
    }

    public static function builder(): ListItemsCreatedEventRequestBuilder
    {
        $instance = new self();
        $constructor = function ($body) use ($instance): ListItemsCreatedEventRequest {
            $instance->body = $body;
            return $instance;
        };
        return new class($constructor) extends ListItemsCreatedEventRequestBuilder
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
        $instance->body = isset($data['body']) ? ListItemBody::fromValue($data['body']) : null;
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
