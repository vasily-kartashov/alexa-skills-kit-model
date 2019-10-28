<?php

namespace Alexa\Model\ER\Dynamic;

use \JsonSerializable;

final class EntityValueAndSynonyms implements JsonSerializable
{
    /** @var string|null */
    private $value = null;

    /** @var string[] */
    private $synonyms = [];

    protected function __construct()
    {
    }

    /**
     * @return string|null
     */
    public function value()
    {
        return $this->value;
    }

    /**
     * @return string[]
     */
    public function synonyms()
    {
        return $this->synonyms;
    }

    public static function builder(): EntityValueAndSynonymsBuilder
    {
        $instance = new self();
        $constructor = function ($value, $synonyms) use ($instance): EntityValueAndSynonyms {
            $instance->value = $value;
            $instance->synonyms = $synonyms;
            return $instance;
        };
        return new class($constructor) extends EntityValueAndSynonymsBuilder
        {
            public function __construct(callable $constructor)
            {
                parent::__construct($constructor);
            }
        };
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self();
        $instance->value = isset($data['value']) ? ((string) $data['value']) : null;
        $instance->synonyms = [];
        if (isset($data['synonyms'])) {
            foreach ($data['synonyms'] as $item) {
                $element = isset($item) ? ((string) $item) : null;
                if ($element !== null) {
                    $instance->synonyms[] = $element;
                }
            }
        }
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'value' => $this->value,
            'synonyms' => $this->synonyms
        ]);
    }
}
