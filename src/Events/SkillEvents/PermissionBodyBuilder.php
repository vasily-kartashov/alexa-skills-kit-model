<?php

namespace Alexa\Model\Events\SkillEvents;

abstract class PermissionBodyBuilder
{
    /** @var callable */
    private $constructor;

    /** @var Permission[] */
    private $acceptedPermissions = [];

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param array $acceptedPermissions
     * @return self
     */
    public function withAcceptedPermissions(array $acceptedPermissions): self
    {
        foreach ($acceptedPermissions as $element) {
            assert($element instanceof Permission);
        }
        $this->acceptedPermissions = $acceptedPermissions;
        return $this;
    }

    public function build(): PermissionBody
    {
        return ($this->constructor)(
            $this->acceptedPermissions
        );
    }
}
