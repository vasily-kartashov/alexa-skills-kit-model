<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\Html;

abstract class TransformerBuilder
{
    /** @var callable */
    private $constructor;

    /** @var TransformerType|null */
    private $transformer = null;

    /** @var string|null */
    private $inputPath = null;

    /** @var string|null */
    private $outputName = null;

    public function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param TransformerType $transformer
     * @return self
     */
    public function withTransformer(TransformerType $transformer): self
    {
        $this->transformer = $transformer;
        return $this;
    }

    /**
     * @param string $inputPath
     * @return self
     */
    public function withInputPath(string $inputPath): self
    {
        $this->inputPath = $inputPath;
        return $this;
    }

    /**
     * @param string $outputName
     * @return self
     */
    public function withOutputName(string $outputName): self
    {
        $this->outputName = $outputName;
        return $this;
    }

    public function build(): Transformer
    {
        return ($this->constructor)(
            $this->transformer,
            $this->inputPath,
            $this->outputName
        );
    }
}
