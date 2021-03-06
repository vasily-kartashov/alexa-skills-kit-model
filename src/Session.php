<?php

namespace Alexa\Model;

use JsonSerializable;

final class Session implements JsonSerializable
{
    /** @var bool|null */
    private $new = null;

    /** @var string|null */
    private $sessionId = null;

    /** @var User|null */
    private $user = null;

    /** @var array */
    private $attributes = [];

    /** @var Application|null */
    private $application = null;

    protected function __construct()
    {
    }

    /**
     * @return bool|null
     */
    public function new()
    {
        return $this->new;
    }

    /**
     * @return string|null
     */
    public function sessionId()
    {
        return $this->sessionId;
    }

    /**
     * @return User|null
     */
    public function user()
    {
        return $this->user;
    }

    /**
     * @return array
     */
    public function attributes()
    {
        return $this->attributes;
    }

    /**
     * @return Application|null
     */
    public function application()
    {
        return $this->application;
    }

    public static function builder(): SessionBuilder
    {
        $instance = new self;
        return new class($constructor = function ($new, $sessionId, $user, $attributes, $application) use ($instance): Session {
            $instance->new = $new;
            $instance->sessionId = $sessionId;
            $instance->user = $user;
            $instance->attributes = $attributes;
            $instance->application = $application;
            return $instance;
        }) extends SessionBuilder {};
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->new = isset($data['new']) ? ((bool) $data['new']) : null;
        $instance->sessionId = isset($data['sessionId']) ? ((string) $data['sessionId']) : null;
        $instance->user = isset($data['user']) ? User::fromValue($data['user']) : null;
        $instance->attributes = [];
        if (isset($data['attributes'])) {
            foreach ($data['attributes'] as $item) {
                $element = $item;
                if ($element !== null) {
                    $instance->attributes[] = $element;
                }
            }
        }
        $instance->application = isset($data['application']) ? Application::fromValue($data['application']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'new' => $this->new,
            'sessionId' => $this->sessionId,
            'user' => $this->user,
            'attributes' => $this->attributes,
            'application' => $this->application
        ]);
    }
}
