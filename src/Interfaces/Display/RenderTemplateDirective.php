<?php

namespace Alexa\Model\Interfaces\Display;

use Alexa\Model\Directive;
use JsonSerializable;

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
        return new class($constructor = function ($template) use ($instance): RenderTemplateDirective {
            $instance->template = $template;
            return $instance;
        }) extends RenderTemplateDirectiveBuilder {};
    }

    /**
     * @param Template $template
     * @return self
     */
    public static function ofTemplate(Template $template): RenderTemplateDirective
    {
        $instance = new self;
        $instance->template = $template;
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
