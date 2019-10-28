<?php

namespace Alexa\Model\Services\SkillMessaging;

abstract class SendSkillMessagingRequestBuilder
{
    /** @var callable */
    private $constructor;

    /** @var mixed|null */
    private $data = null;

    /** @var int|null */
    private $expiresAfterSeconds = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param mixed $data
     * @return self
     */
    public function withData($data): self
    {
        $this->data = $data;
        return $this;
    }

    /**
     * @param int $expiresAfterSeconds
     * @return self
     */
    public function withExpiresAfterSeconds(int $expiresAfterSeconds): self
    {
        $this->expiresAfterSeconds = $expiresAfterSeconds;
        return $this;
    }

    public function build(): SendSkillMessagingRequest
    {
        return ($this->constructor)(
            $this->data,
            $this->expiresAfterSeconds
        );
    }
}
