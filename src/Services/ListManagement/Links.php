<?php

namespace Alexa\Model\Services\ListManagement;

use JsonSerializable;

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
        $instance = new self;
        return new class($constructor = function ($next) use ($instance): Links {
            $instance->next = $next;
            return $instance;
        }) extends LinksBuilder {};
    }

    /**
     * @param string $next
     * @return self
     */
    public static function ofNext(string $next): Links
    {
        $instance = new self;
        $instance->next = $next;
        return $instance;
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
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
