<?php

namespace Alexa\Model\Interfaces\Display;

use Alexa\Model\Directive;
use \JsonSerializable;

final class RenderTemplateDirective extends Directive implements JsonSerializable
{
    const TYPE = 'Display.RenderTemplate';

    /** @var Template|null */
    private $template = null;

    protected function __construct()
    {
        parent::__construct();
        $this->type = self::TYPE;
    }

    /**
     * @return Template|null
     */
    public function template()
    {
        return $this->template;
    }

    public static function builder(): RenderTemplateDirectiveBuilder
    {
        $instance = new self;
        $constructor = function ($template) use ($instance): RenderTemplateDirective {
            $instance->template = $template;
            return $instance;
        };
        return new class($constructor) extends RenderTemplateDirectiveBuilder
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
        $instance = new self;
        $instance->type = self::TYPE;
        $instance->template = isset($data['template']) ? Template::fromValue($data['template']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => self::TYPE,
            'template' => $this->template
        ]);
    }
}
