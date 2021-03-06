<?php

namespace Alexa\Model\Interfaces\Viewport;

use Alexa\Model\Interfaces\Viewport\Video\Codecs;

abstract class ViewportVideoBuilder
{
    /** @var callable */
    private $constructor;

    /** @var Codecs[] */
    private $codecs = [];

    public function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param array $codecs
     * @return self
     */
    public function withCodecs(array $codecs): self
    {
        foreach ($codecs as $element) {
            assert($element instanceof Codecs);
        }
        $this->codecs = $codecs;
        return $this;
    }

    public function build(): ViewportVideo
    {
        return ($this->constructor)(
            $this->codecs
        );
    }
}
