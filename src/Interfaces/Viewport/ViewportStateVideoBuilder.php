<?php

namespace Alexa\Model\Interfaces\Viewport;

use Alexa\Model\Interfaces\Viewport\Video\Codecs;

abstract class ViewportStateVideoBuilder
{
    /** @var callable */
    private $constructor;

    /** @var Codecs[] */
    private $codecs = [];

    protected function __construct(callable $constructor)
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

    public function build(): ViewportStateVideo
    {
        return ($this->constructor)(
            $this->codecs
        );
    }
}
