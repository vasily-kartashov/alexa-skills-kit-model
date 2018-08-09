<?php

namespace Alexa\Model\Services\ListManagement;

use \JsonSerializable;

final class Status implements JsonSerializable
{
    /** @var string|null */
    private $url = null;

    /** @var ListItemState|null */
    private $status = null;

    protected function __construct()
    {
    }

    /**
     * @return string|null
     */
    public function url()
    {
        return $this->url;
    }

    /**
     * @return ListItemState|null
     */
    public function status()
    {
        return $this->status;
    }

    public static function builder(): StatusBuilder
    {
        $instance = new self();
        $constructor = function ($url, $status) use ($instance): Status {
            $instance->url = $url;
            $instance->status = $status;
            return $instance;
        };
        return new class($constructor) extends StatusBuilder
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
        $instance->url = isset($data['url']) ? ((string) $data['url']) : null;
        $instance->status = isset($data['status']) ? ListItemState::fromValue($data['status']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'url' => $this->url,
            'status' => $this->status
        ]);
    }
}
