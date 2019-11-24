<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\Html;

abstract class HandleMessageDirectiveBuilder
{
    /** @var callable */
    private $constructor;

    /** @var mixed|null */
    private $message = null;

    /** @var Transformer[] */
    private $transformers = [];

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param mixed $message
     * @return self
     */
    public function withMessage($message): self
    {
        $this->message = $message;
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

    public function build(): HandleMessageDirective
    {
        return ($this->constructor)(
            $this->message,
            $this->transformers
        );
    }
}
