<?php

namespace Alexa\Model\Services\Monetization;

use \JsonSerializable;

final class InSkillProductTransactionsResponse implements JsonSerializable
{
    /** @var Transactions[] */
    private $results = [];

    /** @var Metadata|null */
    private $metadata = null;

    protected function __construct()
    {
    }

    /**
     * @return Transactions[]
     */
    public function results()
    {
        return $this->results;
    }

    /**
     * @return Metadata|null
     */
    public function metadata()
    {
        return $this->metadata;
    }

    public static function builder(): InSkillProductTransactionsResponseBuilder
    {
        $instance = new self;
        $constructor = function ($results, $metadata) use ($instance): InSkillProductTransactionsResponse {
            $instance->results = $results;
            $instance->metadata = $metadata;
            return $instance;
        };
        return new class($constructor) extends InSkillProductTransactionsResponseBuilder
        {
            public function __construct(callable $constructor)
            {
                parent::__construct($constructor);
            }
        };
    }

    /**
     * @param array $results
     * @return self
     */
    public static function ofResults(array $results): InSkillProductTransactionsResponse
    {
        $instance = new self;
        $instance->results = $results;
        return $instance;
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->results = [];
        if (isset($data['results'])) {
            foreach ($data['results'] as $item) {
                $element = isset($item) ? Transactions::fromValue($item) : null;
                if ($element !== null) {
                    $instance->results[] = $element;
                }
            }
        }
        $instance->metadata = isset($data['metadata']) ? Metadata::fromValue($data['metadata']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'results' => $this->results,
            'metadata' => $this->metadata
        ]);
    }
}
