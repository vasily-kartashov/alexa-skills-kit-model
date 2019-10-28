<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\APL;

abstract class OpenUrlCommandBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $source = null;

    /** @var Command[] */
    private $onFail = [];

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param string $source
     * @return self
     */
    public function withSource(string $source): self
    {
        $this->source = $source;
        return $this;
    }

    /**
     * @param array $onFail
     * @return self
     */
    public function withOnFail(array $onFail): self
    {
        foreach ($onFail as $element) {
            assert($element instanceof Command);
        }
        $this->onFail = $onFail;
        return $this;
    }

    public function build(): OpenUrlCommand
    {
        return ($this->constructor)(
            $this->source,
            $this->onFail
        );
    }
}
