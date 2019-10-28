<?php

namespace Alexa\Model\Services\Monetization;

abstract class MetadataBuilder
{
    /** @var callable */
    private $constructor;

    /** @var ResultSet|null */
    private $resultSet = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param ResultSet $resultSet
     * @return self
     */
    public function withResultSet(ResultSet $resultSet): self
    {
        $this->resultSet = $resultSet;
        return $this;
    }

    public function build(): Metadata
    {
        return ($this->constructor)(
            $this->resultSet
        );
    }
}
