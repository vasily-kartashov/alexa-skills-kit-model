<?php

namespace Alexa\Model\Interfaces\AudioPlayer;

use \JsonSerializable;

final class AudioPlayerState implements JsonSerializable
{
    /** @var int|null */
    private $offsetInMilliseconds = null;

    /** @var string|null */
    private $token = null;

    /** @var PlayerActivity|null */
    private $playerActivity = null;

    protected function __construct()
    {
    }

    /**
     * @return int|null
     */
    public function offsetInMilliseconds()
    {
        return $this->offsetInMilliseconds;
    }

    /**
     * @return string|null
     */
    public function token()
    {
        return $this->token;
    }

    /**
     * @return PlayerActivity|null
     */
    public function playerActivity()
    {
        return $this->playerActivity;
    }

    public static function builder(): AudioPlayerStateBuilder
    {
        $instance = new self;
        $constructor = function ($offsetInMilliseconds, $token, $playerActivity) use ($instance): AudioPlayerState {
            $instance->offsetInMilliseconds = $offsetInMilliseconds;
            $instance->token = $token;
            $instance->playerActivity = $playerActivity;
            return $instance;
        };
        return new class($constructor) extends AudioPlayerStateBuilder
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
        $instance->offsetInMilliseconds = isset($data['offsetInMilliseconds']) ? ((int) $data['offsetInMilliseconds']) : null;
        $instance->token = isset($data['token']) ? ((string) $data['token']) : null;
        $instance->playerActivity = isset($data['playerActivity']) ? PlayerActivity::fromValue($data['playerActivity']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'offsetInMilliseconds' => $this->offsetInMilliseconds,
            'token' => $this->token,
            'playerActivity' => $this->playerActivity
        ]);
    }
}
