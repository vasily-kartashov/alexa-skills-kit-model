<?php

namespace Alexa\Model\Services\GameEngine;

use \JsonSerializable;

final class ProgressRecognizer extends Recognizer implements JsonSerializable
{
    const TYPE = 'progress';

    /** @var string|null */
    private $recognizer = null;

    /** @var float|null */
    private $completion = null;

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

    /**
     * @return float|null
     */
    public function completion()
    {
        return $this->completion;
    }

    public static function builder(): ProgressRecognizerBuilder
    {
        $instance = new self;
        $constructor = function ($recognizer, $completion) use ($instance): ProgressRecognizer {
            $instance->recognizer = $recognizer;
            $instance->completion = $completion;
            return $instance;
        };
        return new class($constructor) extends ProgressRecognizerBuilder
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
        $instance = new self;
        $instance->type = self::TYPE;
        $instance->recognizer = isset($data['recognizer']) ? ((string) $data['recognizer']) : null;
        $instance->completion = isset($data['completion']) ? ((float) $data['completion']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => self::TYPE,
            'recognizer' => $this->recognizer,
            'completion' => $this->completion
        ]);
    }
}
