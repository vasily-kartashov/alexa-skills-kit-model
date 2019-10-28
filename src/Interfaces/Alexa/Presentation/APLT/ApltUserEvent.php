<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\APLT;

use Alexa\Model\Request;
use \JsonSerializable;

final class ApltUserEvent extends Request implements JsonSerializable
{
    const TYPE = 'Alexa.Presentation.APLT.UserEvent';

    /** @var string|null */
    private $token = null;

    /** @var array */
    private $arguments = [];

    /** @var mixed|null */
    private $source = null;

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
     * @return array
     */
    public function arguments()
    {
        return $this->arguments;
    }

    /**
     * @return mixed|null
     */
    public function source()
    {
        return $this->source;
    }

    public static function builder(): ApltUserEventBuilder
    {
        $instance = new self;
        $constructor = function ($token, $arguments, $source) use ($instance): ApltUserEvent {
            $instance->token = $token;
            $instance->arguments = $arguments;
            $instance->source = $source;
            return $instance;
        };
        return new class($constructor) extends ApltUserEventBuilder
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
        $instance->token = isset($data['token']) ? ((string) $data['token']) : null;
        $instance->arguments = [];
        if (isset($data['arguments'])) {
            foreach ($data['arguments'] as $item) {
                $element = $item;
                if ($element !== null) {
                    $instance->arguments[] = $element;
                }
            }
        }
        $instance->source = $data['source'];
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => self::TYPE,
            'token' => $this->token,
            'arguments' => $this->arguments,
            'source' => $this->source
        ]);
    }
}
