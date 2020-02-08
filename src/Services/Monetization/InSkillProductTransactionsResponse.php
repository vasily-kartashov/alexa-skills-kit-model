<?php

namespace Alexa\Model\Services\Monetization;

use JsonSerializable;

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
        return new class($constructor = function ($results, $metadata) use ($instance): InSkillProductTransactionsResponse {
            $instance->results = $results;
            $instance->metadata = $metadata;
            return $instance;
        }) extends InSkillProductTransactionsResponseBuilder {};
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
