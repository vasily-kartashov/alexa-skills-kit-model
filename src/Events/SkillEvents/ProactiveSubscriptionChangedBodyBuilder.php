<?php

namespace Alexa\Model\Events\SkillEvents;

abstract class ProactiveSubscriptionChangedBodyBuilder
{
    /** @var callable */
    private $constructor;

    /** @var ProactiveSubscriptionEvent[] */
    private $subscriptions = [];

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param array $subscriptions
     * @return self
     */
    public function withSubscriptions(array $subscriptions): self
    {
        foreach ($subscriptions as $element) {
            assert($element instanceof ProactiveSubscriptionEvent);
        }
        $this->subscriptions = $subscriptions;
        return $this;
    }

    public function build(): ProactiveSubscriptionChangedBody
    {
        return ($this->constructor)(
            $this->subscriptions
        );
    }
}
