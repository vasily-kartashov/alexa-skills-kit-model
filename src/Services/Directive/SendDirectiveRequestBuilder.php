<?php

namespace Alexa\Model\Services\Directive;

abstract class SendDirectiveRequestBuilder
{
    /** @var callable */
    private $constructor;

    /** @var Header|null */
    private $header = null;

    /** @var Directive|null */
    private $directive = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param Header $header
     * @return self
     */
    public function withHeader(Header $header): self
    {
        $this->header = $header;
        return $this;
    }

    /**
     * @param Directive $directive
     * @return self
     */
    public function withDirective(Directive $directive): self
    {
        $this->directive = $directive;
        return $this;
    }

    public function build(): SendDirectiveRequest
    {
        return ($this->constructor)(
            $this->header,
            $this->directive
        );
    }
}
