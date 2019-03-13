<?php

namespace Alexa\Model\Interfaces\AmazonPay\Model\Response;

use \DateTime;

abstract class AuthorizationStatusBuilder
{
    /** @var callable */
    private $constructor;

    /** @var State|null */
    private $state = null;

    /** @var string|null */
    private $reasonCode = null;

    /** @var string|null */
    private $reasonDescription = null;

    /** @var DateTime|null */
    private $lastUpdateTimestamp = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param mixed $state
     * @return self
     */
    public function withState(State $state): self
    {
        $this->state = $state;
        return $this;
    }

    /**
     * @param mixed $reasonCode
     * @return self
     */
    public function withReasonCode(string $reasonCode): self
    {
        $this->reasonCode = $reasonCode;
        return $this;
    }

    /**
     * @param mixed $reasonDescription
     * @return self
     */
    public function withReasonDescription(string $reasonDescription): self
    {
        $this->reasonDescription = $reasonDescription;
        return $this;
    }

    /**
     * @param mixed $lastUpdateTimestamp
     * @return self
     */
    public function withLastUpdateTimestamp(DateTime $lastUpdateTimestamp): self
    {
        $this->lastUpdateTimestamp = $lastUpdateTimestamp;
        return $this;
    }

    public function build(): AuthorizationStatus
    {
        return ($this->constructor)(
            $this->state,
            $this->reasonCode,
            $this->reasonDescription,
            $this->lastUpdateTimestamp
        );
    }
}
