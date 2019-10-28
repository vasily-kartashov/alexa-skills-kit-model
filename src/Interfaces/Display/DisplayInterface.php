<?php

namespace Alexa\Model\Interfaces\Display;

use \JsonSerializable;

final class DisplayInterface implements JsonSerializable
{
    /** @var string|null */
    private $templateVersion = null;

    /** @var string|null */
    private $markupVersion = null;

    protected function __construct()
    {
    }

    /**
     * @return string|null
     */
    public function templateVersion()
    {
        return $this->templateVersion;
    }

    /**
     * @return string|null
     */
    public function markupVersion()
    {
        return $this->markupVersion;
    }

    public static function builder(): DisplayInterfaceBuilder
    {
        $instance = new self;
        $constructor = function ($templateVersion, $markupVersion) use ($instance): DisplayInterface {
            $instance->templateVersion = $templateVersion;
            $instance->markupVersion = $markupVersion;
            return $instance;
        };
        return new class($constructor) extends DisplayInterfaceBuilder
        {
            public function __construct(callable $constructor)
            {
                parent::__construct($constructor);
            }
        };
    }

    /**
     * @param string $templateVersion
     * @return self
     */
    public static function ofTemplateVersion(string $templateVersion): DisplayInterface
    {
        $instance = new self;
        $instance->templateVersion = $templateVersion;
        return $instance;
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->templateVersion = isset($data['templateVersion']) ? ((string) $data['templateVersion']) : null;
        $instance->markupVersion = isset($data['markupVersion']) ? ((string) $data['markupVersion']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'templateVersion' => $this->templateVersion,
            'markupVersion' => $this->markupVersion
        ]);
    }
}
