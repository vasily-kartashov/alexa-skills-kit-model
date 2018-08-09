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

    /** @var null[] */
    private $attributes = [];

    /** @var Application|null */
    private $application = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    public function withNew(bool $new): self
    {
        $this->new = $new;
        return $this;
    }

    public function withSessionId(string $sessionId): self
    {
        $this->sessionId = $sessionId;
        return $this;
    }

    public function withUser(User $user): self
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @param null[] $attributes
     * @return self
     */
    public function withAttributes(array $attributes): self
    {
        $this->attributes = $attributes;
        return $this;
    }

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
