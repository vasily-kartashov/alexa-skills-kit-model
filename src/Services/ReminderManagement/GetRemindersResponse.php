<?php

namespace Alexa\Model\Services\ReminderManagement;

use JsonSerializable;

final class GetRemindersResponse implements JsonSerializable
{
    /** @var string|null */
    private $totalCount = null;

    /** @var Reminder[] */
    private $alerts = [];

    /** @var string|null */
    private $links = null;

    protected function __construct()
    {
    }

    /**
     * @return string|null
     */
    public function totalCount()
    {
        return $this->totalCount;
    }

    /**
     * @return Reminder[]
     */
    public function alerts()
    {
        return $this->alerts;
    }

    /**
     * @return string|null
     */
    public function links()
    {
        return $this->links;
    }

    public static function builder(): GetRemindersResponseBuilder
    {
        $instance = new self;
        return new class($constructor = function ($totalCount, $alerts, $links) use ($instance): GetRemindersResponse {
            $instance->totalCount = $totalCount;
            $instance->alerts = $alerts;
            $instance->links = $links;
            return $instance;
        }) extends GetRemindersResponseBuilder {};
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->totalCount = isset($data['totalCount']) ? ((string) $data['totalCount']) : null;
        $instance->alerts = [];
        if (isset($data['alerts'])) {
            foreach ($data['alerts'] as $item) {
                $element = isset($item) ? Reminder::fromValue($item) : null;
                if ($element !== null) {
                    $instance->alerts[] = $element;
                }
            }
        }
        $instance->links = isset($data['links']) ? ((string) $data['links']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'totalCount' => $this->totalCount,
            'alerts' => $this->alerts,
            'links' => $this->links
        ]);
    }
}
