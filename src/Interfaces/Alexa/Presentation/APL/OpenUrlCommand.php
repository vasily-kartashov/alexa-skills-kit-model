<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\APL;

use \JsonSerializable;

final class OpenUrlCommand extends Command implements JsonSerializable
{
    const TYPE = 'OpenURL';

    /** @var string|null */
    private $source = null;

    /** @var Command[] */
    private $onFail = [];

    protected function __construct()
    {
        parent::__construct();
        $this->type = self::TYPE;
    }

    /**
     * @return string|null
     */
    public function source()
    {
        return $this->source;
    }

    /**
     * @return Command[]
     */
    public function onFail()
    {
        return $this->onFail;
    }

    public static function builder(): OpenUrlCommandBuilder
    {
        $instance = new self;
        $constructor = function ($source, $onFail) use ($instance): OpenUrlCommand {
            $instance->source = $source;
            $instance->onFail = $onFail;
            return $instance;
        };
        return new class($constructor) extends OpenUrlCommandBuilder
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
        $instance->source = isset($data['source']) ? ((string) $data['source']) : null;
        $instance->onFail = [];
        if (isset($data['onFail'])) {
            foreach ($data['onFail'] as $item) {
                $element = isset($item) ? Command::fromValue($item) : null;
                if ($element !== null) {
                    $instance->onFail[] = $element;
                }
            }
        }
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => self::TYPE,
            'source' => $this->source,
            'onFail' => $this->onFail
        ]);
    }
}
