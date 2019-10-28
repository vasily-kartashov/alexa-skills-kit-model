<?php

namespace Alexa\Model\Interfaces\Viewport;

use Alexa\Model\Interfaces\Viewport\APLT\CharacterFormat;
use Alexa\Model\Interfaces\Viewport\APLT\InterSegment;
use Alexa\Model\Interfaces\Viewport\APLT\ViewportProfile;

abstract class APLTViewportStateBuilder
{
    /** @var callable */
    private $constructor;

    /** @var ViewportProfile[] */
    private $supportedProfiles = [];

    /** @var int|null */
    private $lineLength = null;

    /** @var int|null */
    private $lineCount = null;

    /** @var CharacterFormat|null */
    private $characterFormat = null;

    /** @var InterSegment[] */
    private $interSegments = [];

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param array $supportedProfiles
     * @return self
     */
    public function withSupportedProfiles(array $supportedProfiles): self
    {
        foreach ($supportedProfiles as $element) {
            assert($element instanceof ViewportProfile);
        }
        $this->supportedProfiles = $supportedProfiles;
        return $this;
    }

    /**
     * @param int $lineLength
     * @return self
     */
    public function withLineLength(int $lineLength): self
    {
        $this->lineLength = $lineLength;
        return $this;
    }

    /**
     * @param int $lineCount
     * @return self
     */
    public function withLineCount(int $lineCount): self
    {
        $this->lineCount = $lineCount;
        return $this;
    }

    /**
     * @param CharacterFormat $characterFormat
     * @return self
     */
    public function withCharacterFormat(CharacterFormat $characterFormat): self
    {
        $this->characterFormat = $characterFormat;
        return $this;
    }

    /**
     * @param array $interSegments
     * @return self
     */
    public function withInterSegments(array $interSegments): self
    {
        foreach ($interSegments as $element) {
            assert($element instanceof InterSegment);
        }
        $this->interSegments = $interSegments;
        return $this;
    }

    public function build(): APLTViewportState
    {
        return ($this->constructor)(
            $this->supportedProfiles,
            $this->lineLength,
            $this->lineCount,
            $this->characterFormat,
            $this->interSegments
        );
    }
}
