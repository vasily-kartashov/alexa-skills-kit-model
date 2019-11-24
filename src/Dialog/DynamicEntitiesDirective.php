<?php

namespace Alexa\Model\Dialog;

use Alexa\Model\Directive;
use Alexa\Model\ER\Dynamic\EntityListItem;
use Alexa\Model\ER\Dynamic\UpdateBehavior;
use JsonSerializable;

final class DynamicEntitiesDirective extends Directive implements JsonSerializable
{
    const TYPE = 'Dialog.UpdateDynamicEntities';

    /** @var UpdateBehavior|null */
    private $updateBehavior = null;

    /** @var EntityListItem[] */
    private $types = [];

    protected function __construct()
    {
        parent::__construct();
        $this->type = self::TYPE;
    }

    /**
     * @return UpdateBehavior|null
     */
    public function updateBehavior()
    {
        return $this->updateBehavior;
    }

    /**
     * @return EntityListItem[]
     */
    public function types()
    {
        return $this->types;
    }

    public static function builder(): DynamicEntitiesDirectiveBuilder
    {
        $instance = new self;
        return new class($constructor = function ($updateBehavior, $types) use ($instance): DynamicEntitiesDirective {
            $instance->updateBehavior = $updateBehavior;
            $instance->types = $types;
            return $instance;
        }) extends DynamicEntitiesDirectiveBuilder {};
    }

    /**
     * @param UpdateBehavior $updateBehavior
     * @return self
     */
    public static function ofUpdateBehavior(UpdateBehavior $updateBehavior): DynamicEntitiesDirective
    {
        $instance = new self;
        $instance->updateBehavior = $updateBehavior;
        return $instance;
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->type = self::TYPE;
        $instance->updateBehavior = isset($data['updateBehavior']) ? UpdateBehavior::fromValue($data['updateBehavior']) : null;
        $instance->types = [];
        if (isset($data['types'])) {
            foreach ($data['types'] as $item) {
                $element = isset($item) ? EntityListItem::fromValue($item) : null;
                if ($element !== null) {
                    $instance->types[] = $element;
                }
            }
        }
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => self::TYPE,
            'updateBehavior' => $this->updateBehavior,
            'types' => $this->types
        ]);
    }
}
