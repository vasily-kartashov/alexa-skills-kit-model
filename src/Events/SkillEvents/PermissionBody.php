<?php

namespace Alexa\Model\Events\SkillEvents;

use JsonSerializable;

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
        $instance = new self;
        return new class($constructor = function ($acceptedPermissions) use ($instance): PermissionBody {
            $instance->acceptedPermissions = $acceptedPermissions;
            return $instance;
        }) extends PermissionBodyBuilder {};
    }

    /**
     * @param array $acceptedPermissions
     * @return self
     */
    public static function ofAcceptedPermissions(array $acceptedPermissions): PermissionBody
    {
        $instance = new self;
        $instance->acceptedPermissions = $acceptedPermissions;
        return $instance;
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->acceptedPermissions = [];
        if (isset($data['acceptedPermissions'])) {
            foreach ($data['acceptedPermissions'] as $item) {
                $element = isset($item) ? Permission::fromValue($item) : null;
                if ($element !== null) {
                    $instance->acceptedPermissions[] = $element;
                }
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
