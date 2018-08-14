<?php

namespace Alexa\Model\Events\SkillEvents;

use \JsonSerializable;

final class PermissionBody implements JsonSerializable
{
    /** @var Permission[] */
    private $acceptedPermissions = [];

    protected function __construct()
    {
    }

    /**
     * @return Permission[]
     */
    public function acceptedPermissions()
    {
        return $this->acceptedPermissions;
    }

    public static function builder(): PermissionBodyBuilder
    {
        $instance = new self();
        $constructor = function ($acceptedPermissions) use ($instance): PermissionBody {
            $instance->acceptedPermissions = $acceptedPermissions;
            return $instance;
        };
        return new class($constructor) extends PermissionBodyBuilder
        {
            public function __construct(callable $constructor)
            {
                parent::__construct($constructor);
            }
        };
    }

    public static function fromValue(array $data)
    {
        $instance = new self();
        $instance->acceptedPermissions = [];
        foreach ($data['acceptedPermissions'] as $item) {
            $element = isset($item) ? Permission::fromValue($item) : null;
            if ($element !== null) {
                $instance->acceptedPermissions[] = $element;
            }
        }
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'acceptedPermissions' => $this->acceptedPermissions
        ]);
    }
}
