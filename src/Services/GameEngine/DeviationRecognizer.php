<?php

namespace Alexa\Model\Services\GameEngine;

use \JsonSerializable;

final class DeviationRecognizer extends Recognizer implements JsonSerializable
{
    const TYPE = 'deviation';

    /** @var string|null */
    private $recognizer = null;

    protected function __construct()
    {
        parent::__construct();
        $this->type = self::TYPE;
    }

    /**
     * @return string|null
     */
    public function recognizer()
    {
        return $this->recognizer;
    }

    public static function builder(): DeviationRecognizerBuilder
    {
        $instance = new self();
        $constructor = function ($recognizer) use ($instance): DeviationRecognizer {
            $instance->recognizer = $recognizer;
            return $instance;
        };
        return new class($constructor) extends DeviationRecognizerBuilder
        {
            public function __construct(callable $constructor)
            {
                parent::__construct($constructor);
            }
        };
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self();
        $instance->type = self::TYPE;
        $instance->recognizer = isset($data['recognizer']) ? ((string) $data['recognizer']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => self::TYPE,
            'recognizer' => $this->recognizer
        ]);
    }
}
