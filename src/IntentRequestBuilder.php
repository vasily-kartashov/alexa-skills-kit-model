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

    public function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param DialogState $dialogState
     * @return self
     */
    public function withDialogState(DialogState $dialogState): self
    {
        $this->dialogState = $dialogState;
        return $this;
    }

    /**
     * @param Intent $intent
     * @return self
     */
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
