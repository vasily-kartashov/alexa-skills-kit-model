<?php

namespace Alexa\Model\Services\Monetization;

abstract class InSkillProductTransactionsResponseBuilder
{
    /** @var callable */
    private $constructor;

    /** @var Transactions[] */
    private $results = [];

    /** @var Metadata|null */
    private $metadata = null;

    public function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param array $results
     * @return self
     */
    public function withResults(array $results): self
    {
        foreach ($results as $element) {
            assert($element instanceof Transactions);
        }
        $this->results = $results;
        return $this;
    }

    /**
     * @param Metadata $metadata
     * @return self
     */
    public function withMetadata(Metadata $metadata): self
    {
        $this->metadata = $metadata;
        return $this;
    }

    public function build(): InSkillProductTransactionsResponse
    {
        return ($this->constructor)(
            $this->results,
            $this->metadata
        );
    }
}
