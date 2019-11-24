<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\APL;

use JsonSerializable;

final class RenderedDocumentState implements JsonSerializable
{
    /** @var string|null */
    private $token = null;

    /** @var string|null */
    private $version = null;

    /** @var ComponentVisibleOnScreen[] */
    private $componentsVisibleOnScreen = [];

    protected function __construct()
    {
    }

    /**
     * @return string|null
     */
    public function token()
    {
        return $this->token;
    }

    /**
     * @return string|null
     */
    public function version()
    {
        return $this->version;
    }

    /**
     * @return ComponentVisibleOnScreen[]
     */
    public function componentsVisibleOnScreen()
    {
        return $this->componentsVisibleOnScreen;
    }

    public static function builder(): RenderedDocumentStateBuilder
    {
        $instance = new self;
        return new class($constructor = function ($token, $version, $componentsVisibleOnScreen) use ($instance): RenderedDocumentState {
            $instance->token = $token;
            $instance->version = $version;
            $instance->componentsVisibleOnScreen = $componentsVisibleOnScreen;
            return $instance;
        }) extends RenderedDocumentStateBuilder {};
    }

    /**
     * @param string $token
     * @return self
     */
    public static function ofToken(string $token): RenderedDocumentState
    {
        $instance = new self;
        $instance->token = $token;
        return $instance;
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->token = isset($data['token']) ? ((string) $data['token']) : null;
        $instance->version = isset($data['version']) ? ((string) $data['version']) : null;
        $instance->componentsVisibleOnScreen = [];
        if (isset($data['componentsVisibleOnScreen'])) {
            foreach ($data['componentsVisibleOnScreen'] as $item) {
                $element = isset($item) ? ComponentVisibleOnScreen::fromValue($item) : null;
                if ($element !== null) {
                    $instance->componentsVisibleOnScreen[] = $element;
                }
            }
        }
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'token' => $this->token,
            'version' => $this->version,
            'componentsVisibleOnScreen' => $this->componentsVisibleOnScreen
        ]);
    }
}
