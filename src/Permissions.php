<?php

namespace Alexa\Model;

use \JsonSerializable;

final class Permissions implements JsonSerializable
{
    /** @var string|null */
    private $consentToken = null;

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

    public static function builder(): PermissionsBuilder
    {
        $instance = new self();
        $constructor = function ($consentToken) use ($instance): Permissions {
            $instance->consentToken = $consentToken;
            return $instance;
        };
        return new class($constructor) extends PermissionsBuilder
        {
            public function __construct(callable $constructor)
            {
                parent::__construct($constructor);
            }
        };
    }

    public static function fromValue(array $data)
    {
        $instance = new self();
        $instance->consentToken = isset($data['consentToken']) ? ((string) $data['consentToken']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'consentToken' => $this->consentToken
        ]);
    }
}
