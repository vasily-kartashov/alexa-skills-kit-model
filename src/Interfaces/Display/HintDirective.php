<?php

namespace Alexa\Model\Interfaces\Display;

use Alexa\Model\Directive;
use \JsonSerializable;

final class HintDirective extends Directive implements JsonSerializable
{
    const TYPE = 'Hint';

    /** @var Hint|null */
    private $hint = null;

    protected function __construct()
    {
        parent::__construct();
    }

    /**
     * @return Hint|null
     */
    public function hint()
    {
        return $this->hint;
    }

    public static function builder(): HintDirectiveBuilder
    {
        $instance = new self();
        $constructor = function ($hint) use ($instance): HintDirective {
            $instance->hint = $hint;
            return $instance;
        };
        return new class($constructor) extends HintDirectiveBuilder
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
        $instance->type = self::TYPE;
        $instance->hint = isset($data['hint']) ? Hint::fromValue($data['hint']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => self::TYPE,
            'hint' => $this->hint
        ]);
    }
}
