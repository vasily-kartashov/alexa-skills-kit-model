<?php

namespace Alexa\Model\Services\Monetization;

use \DateTime;

abstract class TransactionsBuilder
{
    /** @var callable */
    private $constructor;

    /** @var Status|null */
    private $status = null;

    /** @var string|null */
    private $productId = null;

    /** @var DateTime|null */
    private $createdTime = null;

    /** @var DateTime|null */
    private $lastModifiedTime = null;

    public function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param Status $status
     * @return self
     */
    public function withStatus(Status $status): self
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @param string $productId
     * @return self
     */
    public function withProductId(string $productId): self
    {
        $this->productId = $productId;
        return $this;
    }

    /**
     * @param DateTime $createdTime
     * @return self
     */
    public function withCreatedTime(DateTime $createdTime): self
    {
        $this->createdTime = $createdTime;
        return $this;
    }

    /**
     * @param DateTime $lastModifiedTime
     * @return self
     */
    public function withLastModifiedTime(DateTime $lastModifiedTime): self
    {
        $this->lastModifiedTime = $lastModifiedTime;
        return $this;
    }

    public function build(): Transactions
    {
        return ($this->constructor)(
            $this->status,
            $this->productId,
            $this->createdTime,
            $this->lastModifiedTime
        );
    }
}
