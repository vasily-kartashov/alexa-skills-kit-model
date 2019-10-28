<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\APL;

abstract class PlayMediaCommandBuilder
{
    /** @var callable */
    private $constructor;

    /** @var AudioTrack|null */
    private $audioTrack = null;

    /** @var string|null */
    private $componentId = null;

    /** @var VideoSource[] */
    private $source = [];

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param AudioTrack $audioTrack
     * @return self
     */
    public function withAudioTrack(AudioTrack $audioTrack): self
    {
        $this->audioTrack = $audioTrack;
        return $this;
    }

    /**
     * @param string $componentId
     * @return self
     */
    public function withComponentId(string $componentId): self
    {
        $this->componentId = $componentId;
        return $this;
    }

    /**
     * @param array $source
     * @return self
     */
    public function withSource(array $source): self
    {
        foreach ($source as $element) {
            assert($element instanceof VideoSource);
        }
        $this->source = $source;
        return $this;
    }

    public function build(): PlayMediaCommand
    {
        return ($this->constructor)(
            $this->audioTrack,
            $this->componentId,
            $this->source
        );
    }
}
