<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\APLT;

use Alexa\Model\Directive;
use JsonSerializable;

final class ApltExecuteCommandsDirective extends Directive implements JsonSerializable
{
    const TYPE = 'Alexa.Presentation.APLT.ExecuteCommands';

    /** @var Command[] */
    private $commands = [];

    /** @var string|null */
    private $token = null;

    protected function __construct()
    {
        parent::__construct();
        $this->type = self::TYPE;
    }

    /**
     * @return Command[]
     */
    public function commands()
    {
        return $this->commands;
    }

    /**
     * @return string|null
     */
    public function token()
    {
        return $this->token;
    }

    public static function builder(): ApltExecuteCommandsDirectiveBuilder
    {
        $instance = new self;
        return new class($constructor = function ($commands, $token) use ($instance): ApltExecuteCommandsDirective {
            $instance->commands = $commands;
            $instance->token = $token;
            return $instance;
        }) extends ApltExecuteCommandsDirectiveBuilder {};
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->type = self::TYPE;
        $instance->commands = [];
        if (isset($data['commands'])) {
            foreach ($data['commands'] as $item) {
                $element = isset($item) ? Command::fromValue($item) : null;
                if ($element !== null) {
                    $instance->commands[] = $element;
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
            'commands' => $this->commands,
            'token' => $this->token
        ]);
    }
}
