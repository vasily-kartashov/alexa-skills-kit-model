<?php

namespace Alexa\Model\Services\ReminderManagement;

abstract class SpokenTextBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $locale = null;

    /** @var string|null */
    private $ssml = null;

    /** @var string|null */
    private $text = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param string $locale
     * @return self
     */
    public function withLocale(string $locale): self
    {
        $this->locale = $locale;
        return $this;
    }

    /**
     * @param string $ssml
     * @return self
     */
    public function withSsml(string $ssml): self
    {
        $this->ssml = $ssml;
        return $this;
    }

    /**
     * @param string $text
     * @return self
     */
    public function withText(string $text): self
    {
        $this->text = $text;
        return $this;
    }

    public function build(): SpokenText
    {
        return ($this->constructor)(
            $this->locale,
            $this->ssml,
            $this->text
        );
    }
}
