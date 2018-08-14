<?php

namespace Alexa\Model\UI;

abstract class AskForPermissionsConsentCardBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string[] */
    private $permissions = [];

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param string[] $permissions
     * @return self
     */
    public function withPermissions(array $permissions): self
    {
        foreach ($permissions as $element) {
            assert(is_string($element));
        }
        $this->permissions = $permissions;
        return $this;
    }

    public function build(): AskForPermissionsConsentCard
    {
        return ($this->constructor)(
            $this->permissions
        );
    }
}
