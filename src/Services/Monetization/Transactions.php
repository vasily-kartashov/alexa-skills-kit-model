<?php

namespace Alexa\Model\Services\Monetization;

use JsonSerializable;
use \DateTime;

final class Transactions implements JsonSerializable
{
    /** @var Status|null */
    private $status = null;

    /** @var string|null */
    private $productId = null;

    /** @var DateTime|null */
    private $createdTime = null;

    /** @var DateTime|null */
    private $lastModifiedTime = null;

    protected function __construct()
    {
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
    public function productId()
    {
        return $this->productId;
    }

    /**
     * @return DateTime|null
     */
    public function createdTime()
    {
        return $this->createdTime;
    }

    /**
     * @return DateTime|null
     */
    public function lastModifiedTime()
    {
        return $this->lastModifiedTime;
    }

    public static function builder(): TransactionsBuilder
    {
        $instance = new self;
        return new class($constructor = function ($status, $productId, $createdTime, $lastModifiedTime) use ($instance): Transactions {
            $instance->status = $status;
            $instance->productId = $productId;
            $instance->createdTime = $createdTime;
            $instance->lastModifiedTime = $lastModifiedTime;
            return $instance;
        }) extends TransactionsBuilder {};
    }

    /**
     * @param Status $status
     * @return self
     */
    public static function ofStatus(Status $status): Transactions
    {
        $instance = new self;
        $instance->status = $status;
        return $instance;
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->status = isset($data['status']) ? Status::fromValue($data['status']) : null;
        $instance->productId = isset($data['productId']) ? ((string) $data['productId']) : null;
        $instance->createdTime = isset($data['createdTime']) ? new DateTime($data['createdTime']) : null;
        $instance->lastModifiedTime = isset($data['lastModifiedTime']) ? new DateTime($data['lastModifiedTime']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'status' => $this->status,
            'productId' => $this->productId,
            'createdTime' => $this->createdTime,
            'lastModifiedTime' => $this->lastModifiedTime
        ]);
    }
}
