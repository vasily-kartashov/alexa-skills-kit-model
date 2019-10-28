<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\APLT;

use Alexa\Model\Directive;
use \JsonSerializable;

final class RenderDocumentDirective extends Directive implements JsonSerializable
{
    const TYPE = 'Alexa.Presentation.APLT.RenderDocument';

    /** @var string|null */
    private $token = null;

    /** @var TargetProfile|null */
    private $targetProfile = null;

    /** @var array */
    private $document = [];

    /** @var array */
    private $datasources = [];

    protected function __construct()
    {
        parent::__construct();
        $this->type = self::TYPE;
    }

    /**
     * @return string|null
     */
    public function token()
    {
        return $this->token;
    }

    /**
     * @return TargetProfile|null
     */
    public function targetProfile()
    {
        return $this->targetProfile;
    }

    /**
     * @return array
     */
    public function document()
    {
        return $this->document;
    }

    /**
     * @return array
     */
    public function datasources()
    {
        return $this->datasources;
    }

    public static function builder(): RenderDocumentDirectiveBuilder
    {
        $instance = new self();
        $constructor = function ($token, $targetProfile, $document, $datasources) use ($instance): RenderDocumentDirective {
            $instance->token = $token;
            $instance->targetProfile = $targetProfile;
            $instance->document = $document;
            $instance->datasources = $datasources;
            return $instance;
        };
        return new class($constructor) extends RenderDocumentDirectiveBuilder
        {
            public function __construct(callable $constructor)
            {
                parent::__construct($constructor);
            }
        };
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self();
        $instance->type = self::TYPE;
        $instance->token = isset($data['token']) ? ((string) $data['token']) : null;
        $instance->targetProfile = isset($data['targetProfile']) ? TargetProfile::fromValue($data['targetProfile']) : null;
        $instance->document = [];
        if (isset($data['document'])) {
            foreach ($data['document'] as $item) {
                $element = $item;
                if ($element !== null) {
                    $instance->document[] = $element;
                }
            }
        }
        $instance->datasources = [];
        if (isset($data['datasources'])) {
            foreach ($data['datasources'] as $item) {
                $element = $item;
                if ($element !== null) {
                    $instance->datasources[] = $element;
                }
            }
        }
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => self::TYPE,
            'token' => $this->token,
            'targetProfile' => $this->targetProfile,
            'document' => $this->document,
            'datasources' => $this->datasources
        ]);
    }
}
