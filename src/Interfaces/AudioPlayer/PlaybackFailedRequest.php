<?php

namespace Alexa\Model\Interfaces\AudioPlayer;

use Alexa\Model\Request;
use \JsonSerializable;

final class PlaybackFailedRequest extends Request implements JsonSerializable
{
    const TYPE = 'AudioPlayer.PlaybackFailed';

    /** @var CurrentPlaybackState|null */
    private $currentPlaybackState = null;

    /** @var Error|null */
    private $error = null;

    /** @var string|null */
    private $token = null;

    protected function __construct()
    {
        parent::__construct();
        $this->type = self::TYPE;
    }

    /**
     * @return CurrentPlaybackState|null
     */
    public function currentPlaybackState()
    {
        return $this->currentPlaybackState;
    }

    /**
     * @return Error|null
     */
    public function error()
    {
        return $this->error;
    }

    /**
     * @return string|null
     */
    public function token()
    {
        return $this->token;
    }

    public static function builder(): PlaybackFailedRequestBuilder
    {
        $instance = new self();
        $constructor = function ($currentPlaybackState, $error, $token) use ($instance): PlaybackFailedRequest {
            $instance->currentPlaybackState = $currentPlaybackState;
            $instance->error = $error;
            $instance->token = $token;
            return $instance;
        };
        return new class($constructor) extends PlaybackFailedRequestBuilder
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
        $instance->currentPlaybackState = isset($data['currentPlaybackState']) ? CurrentPlaybackState::fromValue($data['currentPlaybackState']) : null;
        $instance->error = isset($data['error']) ? Error::fromValue($data['error']) : null;
        $instance->token = isset($data['token']) ? ((string) $data['token']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => self::TYPE,
            'currentPlaybackState' => $this->currentPlaybackState,
            'error' => $this->error,
            'token' => $this->token
        ]);
    }
}
