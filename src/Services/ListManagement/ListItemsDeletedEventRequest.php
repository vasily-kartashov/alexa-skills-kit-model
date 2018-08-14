<?php

namespace Alexa\Model\Services\ListManagement;

use Alexa\Model\Request;
use \JsonSerializable;

final class ListItemsDeletedEventRequest extends Request implements JsonSerializable
{
    const TYPE = 'AlexaHouseholdListEvent.ItemsDeleted';

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

    public static function builder(): ListItemsDeletedEventRequestBuilder
    {
        $instance = new self();
        $constructor = function ($body) use ($instance): ListItemsDeletedEventRequest {
            $instance->body = $body;
            return $instance;
        };
        return new class($constructor) extends ListItemsDeletedEventRequestBuilder
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
