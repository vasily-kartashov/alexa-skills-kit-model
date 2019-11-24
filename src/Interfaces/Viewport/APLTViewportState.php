<?php

namespace Alexa\Model\Interfaces\Viewport;

use Alexa\Model\Interfaces\Viewport\APLT\CharacterFormat;
use Alexa\Model\Interfaces\Viewport\APLT\InterSegment;
use Alexa\Model\Interfaces\Viewport\APLT\ViewportProfile;
use JsonSerializable;

final class APLTViewportState extends TypedViewportState implements JsonSerializable
{
    const TYPE = 'APLT';

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

    protected function __construct()
    {
        parent::__construct();
        $this->type = self::TYPE;
    }

    /**
     * @return ViewportProfile[]
     */
    public function supportedProfiles()
    {
        return $this->supportedProfiles;
    }

    /**
     * @return int|null
     */
    public function lineLength()
    {
        return $this->lineLength;
    }

    /**
     * @return int|null
     */
    public function lineCount()
    {
        return $this->lineCount;
    }

    /**
     * @return CharacterFormat|null
     */
    public function characterFormat()
    {
        return $this->characterFormat;
    }

    /**
     * @return InterSegment[]
     */
    public function interSegments()
    {
        return $this->interSegments;
    }

    public static function builder(): APLTViewportStateBuilder
    {
        $instance = new self;
        return new class($constructor = function ($supportedProfiles, $lineLength, $lineCount, $characterFormat, $interSegments) use ($instance): APLTViewportState {
            $instance->supportedProfiles = $supportedProfiles;
            $instance->lineLength = $lineLength;
            $instance->lineCount = $lineCount;
            $instance->characterFormat = $characterFormat;
            $instance->interSegments = $interSegments;
            return $instance;
        }) extends APLTViewportStateBuilder {};
    }

    /**
     * @param array $supportedProfiles
     * @return self
     */
    public static function ofSupportedProfiles(array $supportedProfiles): APLTViewportState
    {
        $instance = new self;
        $instance->supportedProfiles = $supportedProfiles;
        return $instance;
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->type = self::TYPE;
        $instance->supportedProfiles = [];
        if (isset($data['supportedProfiles'])) {
            foreach ($data['supportedProfiles'] as $item) {
                $element = isset($item) ? ViewportProfile::fromValue($item) : null;
                if ($element !== null) {
                    $instance->supportedProfiles[] = $element;
                }
            }
        }
        $instance->lineLength = isset($data['lineLength']) ? ((int) $data['lineLength']) : null;
        $instance->lineCount = isset($data['lineCount']) ? ((int) $data['lineCount']) : null;
        $instance->characterFormat = isset($data['characterFormat']) ? CharacterFormat::fromValue($data['characterFormat']) : null;
        $instance->interSegments = [];
        if (isset($data['interSegments'])) {
            foreach ($data['interSegments'] as $item) {
                $element = isset($item) ? InterSegment::fromValue($item) : null;
                if ($element !== null) {
                    $instance->interSegments[] = $element;
                }
            }
        }
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => self::TYPE,
            'supportedProfiles' => $this->supportedProfiles,
            'lineLength' => $this->lineLength,
            'lineCount' => $this->lineCount,
            'characterFormat' => $this->characterFormat,
            'interSegments' => $this->interSegments
        ]);
    }
}
