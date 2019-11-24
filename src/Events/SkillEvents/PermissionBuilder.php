<?php

namespace Alexa\Model\Events\SkillEvents;

abstract class PermissionBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $scope = null;

    public function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param string $scope
     * @return self
     */
    public function withScope(string $scope): self
    {
        $this->scope = $scope;
        return $this;
    }

    public function build(): Permission
    {
        return ($this->constructor)(
            $this->scope
        );
    }
}
