<?php

namespace Alexa\Model\Interfaces\AmazonPay\Model\V1;

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
     * @param State $state
     * @return self
     */
    public function withState(State $state): self
    {
        $this->state = $state;
        return $this;
    }

    /**
     * @param string $reasonCode
     * @return self
     */
    public function withReasonCode(string $reasonCode): self
    {
        $this->reasonCode = $reasonCode;
        return $this;
    }

    /**
     * @param string $reasonDescription
     * @return self
     */
    public function withReasonDescription(string $reasonDescription): self
    {
        $this->reasonDescription = $reasonDescription;
        return $this;
    }

    /**
     * @param DateTime $lastUpdateTimestamp
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
