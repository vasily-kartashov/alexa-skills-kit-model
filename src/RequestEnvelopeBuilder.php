<?php

namespace Alexa\Model;

abstract class RequestEnvelopeBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $version = null;

    /** @var Session|null */
    private $session = null;

    /** @var Context|null */
    private $context = null;

    /** @var Request|null */
    private $request = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param mixed $version
     * @return self
     */
    public function withVersion(string $version): self
    {
        $this->version = $version;
        return $this;
    }

    /**
     * @param mixed $session
     * @return self
     */
    public function withSession(Session $session): self
    {
        $this->session = $session;
        return $this;
    }

    /**
     * @param mixed $context
     * @return self
     */
    public function withContext(Context $context): self
    {
        $this->context = $context;
        return $this;
    }

    /**
     * @param mixed $request
     * @return self
     */
    public function withRequest(Request $request): self
    {
        $this->request = $request;
        return $this;
    }

    public function build(): RequestEnvelope
    {
        return ($this->constructor)(
            $this->version,
            $this->session,
            $this->context,
            $this->request
        );
    }
}
