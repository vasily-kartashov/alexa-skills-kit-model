<?php

namespace Alexa\Model\Services\ReminderManagement;

abstract class GetRemindersResponseBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $totalCount = null;

    /** @var Reminder[] */
    private $alerts = [];

    /** @var string|null */
    private $links = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    public function withTotalCount(string $totalCount): self
    {
        $this->totalCount = $totalCount;
        return $this;
    }

    /**
     * @param Reminder[] $alerts
     * @return self
     */
    public function withAlerts(array $alerts): self
    {
        foreach ($alerts as $element) {
            assert($element instanceof Reminder);
        }
        $this->alerts = $alerts;
        return $this;
    }

    public function withLinks(string $links): self
    {
        $this->links = $links;
        return $this;
    }

    public function build(): GetRemindersResponse
    {
        return ($this->constructor)(
            $this->totalCount,
            $this->alerts,
            $this->links
        );
    }
}
