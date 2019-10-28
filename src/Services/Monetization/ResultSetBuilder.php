<?php

namespace Alexa\Model\Services\Monetization;

abstract class ResultSetBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $nextToken = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param string $nextToken
     * @return self
     */
    public function withNextToken(string $nextToken): self
    {
        $this->nextToken = $nextToken;
        return $this;
    }

    public function build(): ResultSet
    {
        return ($this->constructor)(
            $this->nextToken
        );
    }
}
