<?php

namespace Alexa\Model;

abstract class IntentRequestBuilder
{
    /** @var callable */
    private $constructor;

    /** @var DialogState|null */
    private $dialogState = null;

    /** @var Intent|null */
    private $intent = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    public function withDialogState(DialogState $dialogState): self
    {
        $this->dialogState = $dialogState;
        return $this;
    }

    public function withIntent(Intent $intent): self
    {
        $this->intent = $intent;
        return $this;
    }

    public function build(): IntentRequest
    {
        return ($this->constructor)(
            $this->dialogState,
            $this->intent
        );
    }
}
