<?php

namespace Alexa\Model;

abstract class SessionBuilder
{
    /** @var callable */
    private $constructor;

    /** @var bool|null */
    private $new = null;

    /** @var string|null */
    private $sessionId = null;

    /** @var User|null */
    private $user = null;

    /** @var array */
    private $attributes = [];

    /** @var Application|null */
    private $application = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param mixed $new
     * @return self
     */
    public function withNew(bool $new): self
    {
        $this->new = $new;
        return $this;
    }

    /**
     * @param mixed $sessionId
     * @return self
     */
    public function withSessionId(string $sessionId): self
    {
        $this->sessionId = $sessionId;
        return $this;
    }

    /**
     * @param mixed $user
     * @return self
     */
    public function withUser(User $user): self
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @param array $attributes
     * @return self
     */
    public function withAttributes(array $attributes): self
    {
        $this->attributes = $attributes;
        return $this;
    }

    /**
     * @param mixed $application
     * @return self
     */
    public function withApplication(Application $application): self
    {
        $this->application = $application;
        return $this;
    }

    public function build(): Session
    {
        return ($this->constructor)(
            $this->new,
            $this->sessionId,
            $this->user,
            $this->attributes,
            $this->application
        );
    }
}
