<?php

namespace Alexa\Model;

use JsonSerializable;

final class Permissions implements JsonSerializable
{
    /** @var string|null */
    private $consentToken = null;

    /** @var Scope[] */
    private $scopes = [];

    protected function __construct()
    {
    }

    /**
     * @return string|null
     */
    public function consentToken()
    {
        return $this->consentToken;
    }

    /**
     * @return Scope[]
     */
    public function scopes()
    {
        return $this->scopes;
    }

    public static function builder(): PermissionsBuilder
    {
        $instance = new self;
        return new class($constructor = function ($consentToken, $scopes) use ($instance): Permissions {
            $instance->consentToken = $consentToken;
            $instance->scopes = $scopes;
            return $instance;
        }) extends PermissionsBuilder {};
    }

    /**
     * @param string $consentToken
     * @return self
     */
    public static function ofConsentToken(string $consentToken): Permissions
    {
        $instance = new self;
        $instance->consentToken = $consentToken;
        return $instance;
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->consentToken = isset($data['consentToken']) ? ((string) $data['consentToken']) : null;
        $instance->scopes = [];
        if (isset($data['scopes'])) {
            foreach ($data['scopes'] as $item) {
                $element = isset($item) ? Scope::fromValue($item) : null;
                if ($element !== null) {
                    $instance->scopes[] = $element;
                }
            }
        }
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'consentToken' => $this->consentToken,
            'scopes' => $this->scopes
        ]);
    }
}
