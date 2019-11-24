<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\Html;

use \JsonSerializable;

final class Transformer implements JsonSerializable
{
    /** @var TransformerType|null */
    private $transformer = null;

    /** @var string|null */
    private $inputPath = null;

    /** @var string|null */
    private $outputName = null;

    protected function __construct()
    {
    }

    /**
     * @return TransformerType|null
     */
    public function transformer()
    {
        return $this->transformer;
    }

    /**
     * @return string|null
     */
    public function inputPath()
    {
        return $this->inputPath;
    }

    /**
     * @return string|null
     */
    public function outputName()
    {
        return $this->outputName;
    }

    public static function builder(): TransformerBuilder
    {
        $instance = new self;
        $constructor = function ($transformer, $inputPath, $outputName) use ($instance): Transformer {
            $instance->transformer = $transformer;
            $instance->inputPath = $inputPath;
            $instance->outputName = $outputName;
            return $instance;
        };
        return new class($constructor) extends TransformerBuilder
        {
            public function __construct(callable $constructor)
            {
                parent::__construct($constructor);
            }
        };
    }

    /**
     * @param TransformerType $transformer
     * @return self
     */
    public static function ofTransformer(TransformerType $transformer): Transformer
    {
        $instance = new self;
        $instance->transformer = $transformer;
        return $instance;
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->transformer = isset($data['transformer']) ? TransformerType::fromValue($data['transformer']) : null;
        $instance->inputPath = isset($data['inputPath']) ? ((string) $data['inputPath']) : null;
        $instance->outputName = isset($data['outputName']) ? ((string) $data['outputName']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'transformer' => $this->transformer,
            'inputPath' => $this->inputPath,
            'outputName' => $this->outputName
        ]);
    }
}
