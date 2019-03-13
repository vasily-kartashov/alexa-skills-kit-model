<?php

namespace Alexa\Model\CanFulfill;

use Alexa\Model\DialogState;
use Alexa\Model\Intent;

abstract class CanFulfillIntentRequestBuilder
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

    public function build(): CanFulfillIntentRequest
    {
        return ($this->constructor)(
            $this->dialogState,
            $this->intent
        );
    }
}
