<?php

namespace Alexa\Model\Interfaces\Connections\V1;

use Alexa\Model\Directive;
use JsonSerializable;

final class StartConnectionDirective extends Directive implements JsonSerializable
{
    const TYPE = 'Connections.StartConnection';

    /** @var string|null */
    private $uri = null;

    /** @var array */
    private $input = [];

    /** @var string|null */
    private $token = null;

    protected function __construct()
    {
        parent::__construct();
        $this->type = self::TYPE;
    }

    /**
     * @return string|null
     */
    public function uri()
    {
        return $this->uri;
    }

    /**
     * @return array
     */
    public function input()
    {
        return $this->input;
    }

    /**
     * @return string|null
     */
    public function token()
    {
        return $this->token;
    }

    public static function builder(): StartConnectionDirectiveBuilder
    {
        $instance = new self;
        return new class($constructor = function ($uri, $input, $token) use ($instance): StartConnectionDirective {
            $instance->uri = $uri;
            $instance->input = $input;
            $instance->token = $token;
            return $instance;
        }) extends StartConnectionDirectiveBuilder {};
    }

    /**
     * @param string $uri
     * @return self
     */
    public static function ofUri(string $uri): StartConnectionDirective
    {
        $instance = new self;
        $instance->uri = $uri;
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
        $instance->uri = isset($data['uri']) ? ((string) $data['uri']) : null;
        $instance->input = [];
        if (isset($data['input'])) {
            foreach ($data['input'] as $item) {
                $element = $item;
                if ($element !== null) {
                    $instance->input[] = $element;
                }
            }
        }
        $instance->token = isset($data['token']) ? ((string) $data['token']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => self::TYPE,
            'uri' => $this->uri,
            'input' => $this->input,
            'token' => $this->token
        ]);
    }
}
