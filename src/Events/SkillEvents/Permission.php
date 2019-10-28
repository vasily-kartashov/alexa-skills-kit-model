<?php

namespace Alexa\Model\Events\SkillEvents;

use \JsonSerializable;

final class Permission implements JsonSerializable
{
    /** @var string|null */
    private $scope = null;

    protected function __construct()
    {
    }

    /**
     * @return string|null
     */
    public function scope()
    {
        return $this->scope;
    }

    public static function builder(): PermissionBuilder
    {
        $instance = new self;
        $constructor = function ($scope) use ($instance): Permission {
            $instance->scope = $scope;
            return $instance;
        };
        return new class($constructor) extends PermissionBuilder
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
        $instance = new self;
        $instance->scope = isset($data['scope']) ? ((string) $data['scope']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'scope' => $this->scope
        ]);
    }
}
