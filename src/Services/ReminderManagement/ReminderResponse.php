<?php

namespace Alexa\Model\Services\ReminderManagement;

use \JsonSerializable;

final class ReminderResponse implements JsonSerializable
{
    /** @var string|null */
    private $alertToken = null;

    /** @var string|null */
    private $createdTime = null;

    /** @var string|null */
    private $updatedTime = null;

    /** @var Status|null */
    private $status = null;

    /** @var string|null */
    private $version = null;

    /** @var string|null */
    private $href = null;

    protected function __construct()
    {
    }

    /**
     * @return string|null
     */
    public function alertToken()
    {
        return $this->alertToken;
    }

    /**
     * @return string|null
     */
    public function createdTime()
    {
        return $this->createdTime;
    }

    /**
     * @return string|null
     */
    public function updatedTime()
    {
        return $this->updatedTime;
    }

    /**
     * @return Status|null
     */
    public function status()
    {
        return $this->status;
    }

    /**
     * @return string|null
     */
    public function version()
    {
        return $this->version;
    }

    /**
     * @return string|null
     */
    public function href()
    {
        return $this->href;
    }

    public static function builder(): ReminderResponseBuilder
    {
        $instance = new self();
        $constructor = function ($alertToken, $createdTime, $updatedTime, $status, $version, $href) use ($instance): ReminderResponse {
            $instance->alertToken = $alertToken;
            $instance->createdTime = $createdTime;
            $instance->updatedTime = $updatedTime;
            $instance->status = $status;
            $instance->version = $version;
            $instance->href = $href;
            return $instance;
        };
        return new class($constructor) extends ReminderResponseBuilder
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
        $instance->alertToken = isset($data['alertToken']) ? ((string) $data['alertToken']) : null;
        $instance->createdTime = isset($data['createdTime']) ? ((string) $data['createdTime']) : null;
        $instance->updatedTime = isset($data['updatedTime']) ? ((string) $data['updatedTime']) : null;
        $instance->status = isset($data['status']) ? Status::fromValue($data['status']) : null;
        $instance->version = isset($data['version']) ? ((string) $data['version']) : null;
        $instance->href = isset($data['href']) ? ((string) $data['href']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'alertToken' => $this->alertToken,
            'createdTime' => $this->createdTime,
            'updatedTime' => $this->updatedTime,
            'status' => $this->status,
            'version' => $this->version,
            'href' => $this->href
        ]);
    }
}
