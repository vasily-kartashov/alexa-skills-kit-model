<?php

namespace Alexa\Model\Services\ListManagement;

use \JsonSerializable;

final class Links implements JsonSerializable
{
    /** @var string|null */
    private $next = null;

    protected function __construct()
    {
    }

    /**
     * @return string|null
     */
    public function next()
    {
        return $this->next;
    }

    public static function builder(): LinksBuilder
    {
        $instance = new self();
        $constructor = function ($next) use ($instance): Links {
            $instance->next = $next;
            return $instance;
        };
        return new class($constructor) extends LinksBuilder
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
        $instance->next = isset($data['next']) ? ((string) $data['next']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'next' => $this->next
        ]);
    }
}
