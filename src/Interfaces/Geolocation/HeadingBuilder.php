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

    public function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param float $directionInDegrees
     * @return self
     */
    public function withDirectionInDegrees(float $directionInDegrees): self
    {
        $this->directionInDegrees = $directionInDegrees;
        return $this;
    }

    /**
     * @param float $accuracyInDegrees
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
