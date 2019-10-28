<?php

namespace Alexa\Model\ER\Dynamic;

abstract class EntityValueAndSynonymsBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $value = null;

    /** @var string[] */
    private $synonyms = [];

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param string $value
     * @return self
     */
    public function withValue(string $value): self
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @param array $synonyms
     * @return self
     */
    public function withSynonyms(array $synonyms): self
    {
        foreach ($synonyms as $element) {
            assert(is_string($element));
        }
        $this->synonyms = $synonyms;
        return $this;
    }

    public function build(): EntityValueAndSynonyms
    {
        return ($this->constructor)(
            $this->value,
            $this->synonyms
        );
    }
}
