<?php

namespace Alexa\Model\Interfaces\Geolocation;

abstract class HeadingBuilder
{
    /** @var callable */
    private $constructor;

    /** @var float|null */
    private $directionInDegrees = null;

    /** @var float|null */
    private $accuracyInDegrees = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param mixed $directionInDegrees
     * @return self
     */
    public function withDirectionInDegrees(float $directionInDegrees): self
    {
        $this->directionInDegrees = $directionInDegrees;
        return $this;
    }

    /**
     * @param mixed $accuracyInDegrees
     * @return self
     */
    public function withAccuracyInDegrees(float $accuracyInDegrees): self
    {
        $this->accuracyInDegrees = $accuracyInDegrees;
        return $this;
    }

    public function build(): Heading
    {
        return ($this->constructor)(
            $this->directionInDegrees,
            $this->accuracyInDegrees
        );
    }
}
