<?php

namespace Alexa\Model\Interfaces\Display;

use \JsonSerializable;

final class PlainTextHint extends Hint implements JsonSerializable
{
    const TYPE = 'PlainText';

    /** @var string|null */
    private $text = null;

    protected function __construct()
    {
        parent::__construct();
    }

    /**
     * @return string|null
     */
    public function text()
    {
        return $this->text;
    }

    public static function builder(): PlainTextHintBuilder
    {
        $instance = new self();
        $constructor = function ($text) use ($instance): PlainTextHint {
            $instance->text = $text;
            return $instance;
        };
        return new class($constructor) extends PlainTextHintBuilder
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
        $instance->text = isset($data['text']) ? ((string) $data['text']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => self::TYPE,
            'text' => $this->text
        ]);
    }
}
