<?php

namespace Alexa\Model\Services\ListManagement;

use JsonSerializable;

final class AlexaListsMetadata implements JsonSerializable
{
    /** @var AlexaListMetadata[] */
    private $lists = [];

    protected function __construct()
    {
    }

    /**
     * @return AlexaListMetadata[]
     */
    public function lists()
    {
        return $this->lists;
    }

    public static function builder(): AlexaListsMetadataBuilder
    {
        $instance = new self;
        return new class($constructor = function ($lists) use ($instance): AlexaListsMetadata {
            $instance->lists = $lists;
            return $instance;
        }) extends AlexaListsMetadataBuilder {};
    }

    /**
     * @param array $lists
     * @return self
     */
    public static function ofLists(array $lists): AlexaListsMetadata
    {
        $instance = new self;
        $instance->lists = $lists;
        return $instance;
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->lists = [];
        if (isset($data['lists'])) {
            foreach ($data['lists'] as $item) {
                $element = isset($item) ? AlexaListMetadata::fromValue($item) : null;
                if ($element !== null) {
                    $instance->lists[] = $element;
                }
            }
        }
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'lists' => $this->lists
        ]);
    }
}
