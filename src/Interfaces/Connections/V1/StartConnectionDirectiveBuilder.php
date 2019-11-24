<?php

namespace Alexa\Model\Interfaces\Connections\V1;

abstract class StartConnectionDirectiveBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $uri = null;

    /** @var array */
    private $input = [];

    /** @var string|null */
    private $token = null;

    public function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param string $uri
     * @return self
     */
    public function withUri(string $uri): self
    {
        $this->uri = $uri;
        return $this;
    }

    /**
     * @param array $input
     * @return self
     */
    public function withInput(array $input): self
    {
        $this->input = $input;
        return $this;
    }

    /**
     * @param string $token
     * @return self
     */
    public function withToken(string $token): self
    {
        $this->token = $token;
        return $this;
    }

    public function build(): StartConnectionDirective
    {
        return ($this->constructor)(
            $this->uri,
            $this->input,
            $this->token
        );
    }
}
