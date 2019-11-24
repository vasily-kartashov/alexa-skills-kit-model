<?php

namespace Alexa\Model\Interfaces\Connections\Entities;

use JsonSerializable;

final class Restaurant extends BaseEntity implements JsonSerializable
{
    const TYPE = 'Restaurant';

    /** @var string|null */
    private $name = null;

    /** @var PostalAddress|null */
    private $location = null;

    protected function __construct()
    {
        parent::__construct();
        $this->type = self::TYPE;
    }

    /**
     * @return string|null
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * @return PostalAddress|null
     */
    public function location()
    {
        return $this->location;
    }

    public static function builder(): RestaurantBuilder
    {
        $instance = new self;
        return new class($constructor = function ($name, $location) use ($instance): Restaurant {
            $instance->name = $name;
            $instance->location = $location;
            return $instance;
        }) extends RestaurantBuilder {};
    }

    /**
     * @param string $name
     * @return self
     */
    public static function ofName(string $name): Restaurant
    {
        $instance = new self;
        $instance->name = $name;
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
        $instance->name = isset($data['name']) ? ((string) $data['name']) : null;
        $instance->location = isset($data['location']) ? PostalAddress::fromValue($data['location']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => self::TYPE,
            'name' => $this->name,
            'location' => $this->location
        ]);
    }
}
