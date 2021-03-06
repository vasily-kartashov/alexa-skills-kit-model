<?php

namespace Alexa\Model\Services\ReminderManagement;

abstract class ReminderResponseBuilder
{
    /** @var callable */
    private $constructor;

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

    public function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param string $alertToken
     * @return self
     */
    public function withAlertToken(string $alertToken): self
    {
        $this->alertToken = $alertToken;
        return $this;
    }

    /**
     * @param string $createdTime
     * @return self
     */
    public function withCreatedTime(string $createdTime): self
    {
        $this->createdTime = $createdTime;
        return $this;
    }

    /**
     * @param string $updatedTime
     * @return self
     */
    public function withUpdatedTime(string $updatedTime): self
    {
        $this->updatedTime = $updatedTime;
        return $this;
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
     * @param string $version
     * @return self
     */
    public function withVersion(string $version): self
    {
        $this->version = $version;
        return $this;
    }

    /**
     * @param string $href
     * @return self
     */
    public function withHref(string $href): self
    {
        $this->href = $href;
        return $this;
    }

    public function build(): ReminderResponse
    {
        return ($this->constructor)(
            $this->alertToken,
            $this->createdTime,
            $this->updatedTime,
            $this->status,
            $this->version,
            $this->href
        );
    }
}
