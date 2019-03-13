<?php

namespace Alexa\Model\Services\ReminderManagement;

abstract class AlertInfoSpokenInfoBuilder
{
    /** @var callable */
    private $constructor;

    /** @var SpokenText[] */
    private $content = [];

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param array $content
     * @return self
     */
    public function withContent(array $content): self
    {
        foreach ($content as $element) {
            assert($element instanceof SpokenText);
        }
        $this->content = $content;
        return $this;
    }

    public function build(): AlertInfoSpokenInfo
    {
        return ($this->constructor)(
            $this->content
        );
    }
}
