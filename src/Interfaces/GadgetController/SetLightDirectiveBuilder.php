<?php

namespace Alexa\Model\Interfaces\GadgetController;

use Alexa\Model\Services\GadgetController\SetLightParameters;

abstract class SetLightDirectiveBuilder
{
    /** @var callable */
    private $constructor;

    /** @var int|null */
    private $version = null;

    /** @var string[] */
    private $targetGadgets = [];

    /** @var SetLightParameters|null */
    private $parameters = null;

    public function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param int $version
     * @return self
     */
    public function withVersion(int $version): self
    {
        $this->version = $version;
        return $this;
    }

    /**
     * @param array $targetGadgets
     * @return self
     */
    public function withTargetGadgets(array $targetGadgets): self
    {
        foreach ($targetGadgets as $element) {
            assert(is_string($element));
        }
        $this->targetGadgets = $targetGadgets;
        return $this;
    }

    /**
     * @param SetLightParameters $parameters
     * @return self
     */
    public function withParameters(SetLightParameters $parameters): self
    {
        $this->parameters = $parameters;
        return $this;
    }

    public function build(): SetLightDirective
    {
        return ($this->constructor)(
            $this->version,
            $this->targetGadgets,
            $this->parameters
        );
    }
}
