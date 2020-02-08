<?php

namespace Alexa\Model;

use JsonSerializable;

final class ResponseEnvelope implements JsonSerializable
{
    /** @var string|null */
    private $version = null;

    /** @var array */
    private $sessionAttributes = [];

    /** @var string|null */
    private $userAgent = null;

    /** @var Response|null */
    private $response = null;

    protected function __construct()
    {
    }

    /**
     * @return string|null
     */
    public function version()
    {
        return $this->version;
    }

    /**
     * @return array
     */
    public function sessionAttributes()
    {
        return $this->sessionAttributes;
    }

    /**
     * @return string|null
     */
    public function userAgent()
    {
        return $this->userAgent;
    }

    /**
     * @return Response|null
     */
    public function response()
    {
        return $this->response;
    }

    public static function builder(): ResponseEnvelopeBuilder
    {
        $instance = new self;
        return new class($constructor = function ($version, $sessionAttributes, $userAgent, $response) use ($instance): ResponseEnvelope {
            $instance->version = $version;
            $instance->sessionAttributes = $sessionAttributes;
            $instance->userAgent = $userAgent;
            $instance->response = $response;
            return $instance;
        }) extends ResponseEnvelopeBuilder {};
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->version = isset($data['version']) ? ((string) $data['version']) : null;
        $instance->sessionAttributes = [];
        if (isset($data['sessionAttributes'])) {
            foreach ($data['sessionAttributes'] as $item) {
                $element = $item;
                if ($element !== null) {
                    $instance->sessionAttributes[] = $element;
                }
            }
        }
        $instance->userAgent = isset($data['userAgent']) ? ((string) $data['userAgent']) : null;
        $instance->response = isset($data['response']) ? Response::fromValue($data['response']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'version' => $this->version,
            'sessionAttributes' => $this->sessionAttributes,
            'userAgent' => $this->userAgent,
            'response' => $this->response
        ]);
    }
}
