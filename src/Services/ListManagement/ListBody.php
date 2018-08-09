<?php

namespace Alexa\Model\Services\ListManagement;

use \JsonSerializable;

final class ListBody implements JsonSerializable
{
    /** @var string|null */
    private $listId = null;

    protected function __construct()
    {
    }

    /**
     * @return string|null
     */
    public function listId()
    {
        return $this->listId;
    }

    public static function builder(): ListBodyBuilder
    {
        $instance = new self();
        $constructor = function ($listId) use ($instance): ListBody {
            $instance->listId = $listId;
            return $instance;
        };
        return new class($constructor) extends ListBodyBuilder
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
        $instance->listId = isset($data['listId']) ? ((string) $data['listId']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'listId' => $this->listId
        ]);
    }
}
