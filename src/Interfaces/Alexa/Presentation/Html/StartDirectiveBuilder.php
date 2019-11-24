<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\Html;

abstract class StartDirectiveBuilder
{
    /** @var callable */
    private $constructor;

    /** @var mixed|null */
    private $data = null;

    /** @var Transformer[] */
    private $transformers = [];

    /** @var StartRequest|null */
    private $request = null;

    /** @var ModelConfiguration|null */
    private $configuration = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param mixed $data
     * @return self
     */
    public function withData($data): self
    {
        $this->data = $data;
        return $this;
    }

    /**
     * @param array $transformers
     * @return self
     */
    public function withTransformers(array $transformers): self
    {
        foreach ($transformers as $element) {
            assert($element instanceof Transformer);
        }
        $this->transformers = $transformers;
        return $this;
    }

    /**
     * @param StartRequest $request
     * @return self
     */
    public function withRequest(StartRequest $request): self
    {
        $this->request = $request;
        return $this;
    }

    /**
     * @param ModelConfiguration $configuration
     * @return self
     */
    public function withConfiguration(ModelConfiguration $configuration): self
    {
        $this->configuration = $configuration;
        return $this;
    }

    public function build(): StartDirective
    {
        return ($this->constructor)(
            $this->data,
            $this->transformers,
            $this->request,
            $this->configuration
        );
    }
}
