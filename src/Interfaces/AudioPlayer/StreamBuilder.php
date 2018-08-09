<?php

namespace Alexa\Model\Interfaces\AudioPlayer;

abstract class StreamBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $expectedPreviousToken = null;

    /** @var string|null */
    private $token = null;

    /** @var string|null */
    private $url = null;

    /** @var int|null */
    private $offsetInMilliseconds = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    public function withExpectedPreviousToken(string $expectedPreviousToken): self
    {
        $this->expectedPreviousToken = $expectedPreviousToken;
        return $this;
    }

    public function withToken(string $token): self
    {
        $this->token = $token;
        return $this;
    }

    public function withUrl(string $url): self
    {
        $this->url = $url;
        return $this;
    }

    public function withOffsetInMilliseconds(int $offsetInMilliseconds): self
    {
        $this->offsetInMilliseconds = $offsetInMilliseconds;
        return $this;
    }

    public function build(): Stream
    {
        return ($this->constructor)(
            $this->expectedPreviousToken,
            $this->token,
            $this->url,
            $this->offsetInMilliseconds
        );
    }
}
