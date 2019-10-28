<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\APL;

use \JsonSerializable;

final class ScrollToIndexCommand extends Command implements JsonSerializable
{
    const TYPE = 'ScrollToIndex';

    /** @var Align|null */
    private $align = null;

    /** @var string|null */
    private $componentId = null;

    /** @var string|null */
    private $index = null;

    protected function __construct()
    {
        parent::__construct();
        $this->type = self::TYPE;
    }

    /**
     * @return Align|null
     */
    public function align()
    {
        return $this->align;
    }

    /**
     * @return string|null
     */
    public function componentId()
    {
        return $this->componentId;
    }

    /**
     * @return string|null
     */
    public function index()
    {
        return $this->index;
    }

    public static function builder(): ScrollToIndexCommandBuilder
    {
        $instance = new self();
        $constructor = function ($align, $componentId, $index) use ($instance): ScrollToIndexCommand {
            $instance->align = $align;
            $instance->componentId = $componentId;
            $instance->index = $index;
            return $instance;
        };
        return new class($constructor) extends ScrollToIndexCommandBuilder
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
        $instance->align = isset($data['align']) ? Align::fromValue($data['align']) : null;
        $instance->componentId = isset($data['componentId']) ? ((string) $data['componentId']) : null;
        $instance->index = isset($data['index']) ? ((string) $data['index']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => self::TYPE,
            'align' => $this->align,
            'componentId' => $this->componentId,
            'index' => $this->index
        ]);
    }
}
