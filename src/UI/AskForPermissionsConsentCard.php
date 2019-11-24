<?php

namespace Alexa\Model\UI;

use JsonSerializable;

final class AskForPermissionsConsentCard extends Card implements JsonSerializable
{
    const TYPE = 'AskForPermissionsConsent';

    /** @var string[] */
    private $permissions = [];

    protected function __construct()
    {
        parent::__construct();
        $this->type = self::TYPE;
    }

    /**
     * @return string[]
     */
    public function permissions()
    {
        return $this->permissions;
    }

    public static function builder(): AskForPermissionsConsentCardBuilder
    {
        $instance = new self;
        return new class($constructor = function ($permissions) use ($instance): AskForPermissionsConsentCard {
            $instance->permissions = $permissions;
            return $instance;
        }) extends AskForPermissionsConsentCardBuilder {};
    }

    /**
     * @param array $permissions
     * @return self
     */
    public static function ofPermissions(array $permissions): AskForPermissionsConsentCard
    {
        $instance = new self;
        $instance->permissions = $permissions;
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
        $instance->permissions = [];
        if (isset($data['permissions'])) {
            foreach ($data['permissions'] as $item) {
                $element = isset($item) ? ((string) $item) : null;
                if ($element !== null) {
                    $instance->permissions[] = $element;
                }
            }
        }
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => self::TYPE,
            'permissions' => $this->permissions
        ]);
    }
}
