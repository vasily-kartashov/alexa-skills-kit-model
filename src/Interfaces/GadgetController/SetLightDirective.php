<?php

namespace Alexa\Model\Interfaces\GadgetController;

use Alexa\Model\Directive;
use Alexa\Model\Services\GadgetController\SetLightParameters;
use JsonSerializable;

final class SetLightDirective extends Directive implements JsonSerializable
{
    const TYPE = 'GadgetController.SetLight';

    /** @var int|null */
    private $version = null;

    /** @var string[] */
    private $targetGadgets = [];

    /** @var SetLightParameters|null */
    private $parameters = null;

    protected function __construct()
    {
        parent::__construct();
        $this->type = self::TYPE;
    }

    /**
     * @return int|null
     */
    public function version()
    {
        return $this->version;
    }

    /**
     * @return string[]
     */
    public function targetGadgets()
    {
        return $this->targetGadgets;
    }

    /**
     * @return SetLightParameters|null
     */
    public function parameters()
    {
        return $this->parameters;
    }

    public static function builder(): SetLightDirectiveBuilder
    {
        $instance = new self;
        return new class($constructor = function ($version, $targetGadgets, $parameters) use ($instance): SetLightDirective {
            $instance->version = $version;
            $instance->targetGadgets = $targetGadgets;
            $instance->parameters = $parameters;
            return $instance;
        }) extends SetLightDirectiveBuilder {};
    }

    /**
     * @param int $version
     * @return self
     */
    public static function ofVersion(int $version): SetLightDirective
    {
        $instance = new self;
        $instance->version = $version;
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
        $instance->version = isset($data['version']) ? ((int) $data['version']) : null;
        $instance->targetGadgets = [];
        if (isset($data['targetGadgets'])) {
            foreach ($data['targetGadgets'] as $item) {
                $element = isset($item) ? ((string) $item) : null;
                if ($element !== null) {
                    $instance->targetGadgets[] = $element;
                }
            }
        }
        $instance->parameters = isset($data['parameters']) ? SetLightParameters::fromValue($data['parameters']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => self::TYPE,
            'version' => $this->version,
            'targetGadgets' => $this->targetGadgets,
            'parameters' => $this->parameters
        ]);
    }
}
