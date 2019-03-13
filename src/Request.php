<?php

namespace Alexa\Model;

use Alexa\Model\CanFulfill\CanFulfillIntentRequest;
use Alexa\Model\Events\SkillEvents\AccountLinkedRequest;
use Alexa\Model\Events\SkillEvents\PermissionAcceptedRequest;
use Alexa\Model\Events\SkillEvents\PermissionChangedRequest;
use Alexa\Model\Events\SkillEvents\ProactiveSubscriptionChangedRequest;
use Alexa\Model\Events\SkillEvents\SkillDisabledRequest;
use Alexa\Model\Events\SkillEvents\SkillEnabledRequest;
use Alexa\Model\Interfaces\Alexa\Presentation\Apl\UserEvent;
use Alexa\Model\Interfaces\AudioPlayer\PlaybackFailedRequest;
use Alexa\Model\Interfaces\AudioPlayer\PlaybackFinishedRequest;
use Alexa\Model\Interfaces\AudioPlayer\PlaybackNearlyFinishedRequest;
use Alexa\Model\Interfaces\AudioPlayer\PlaybackStartedRequest;
use Alexa\Model\Interfaces\AudioPlayer\PlaybackStoppedRequest;
use Alexa\Model\Interfaces\Connections\ConnectionsRequest;
use Alexa\Model\Interfaces\Connections\ConnectionsResponse;
use Alexa\Model\Interfaces\Display\ElementSelectedRequest;
use Alexa\Model\Interfaces\GameEngine\InputHandlerEventRequest;
use Alexa\Model\Interfaces\Messaging\MessageReceivedRequest;
use Alexa\Model\Interfaces\PlaybackController\NextCommandIssuedRequest;
use Alexa\Model\Interfaces\PlaybackController\PauseCommandIssuedRequest;
use Alexa\Model\Interfaces\PlaybackController\PlayCommandIssuedRequest;
use Alexa\Model\Interfaces\PlaybackController\PreviousCommandIssuedRequest;
use Alexa\Model\Interfaces\System\ExceptionEncounteredRequest;
use Alexa\Model\Services\ListManagement\ListCreatedEventRequest;
use Alexa\Model\Services\ListManagement\ListDeletedEventRequest;
use Alexa\Model\Services\ListManagement\ListItemsCreatedEventRequest;
use Alexa\Model\Services\ListManagement\ListItemsDeletedEventRequest;
use Alexa\Model\Services\ListManagement\ListItemsUpdatedEventRequest;
use Alexa\Model\Services\ListManagement\ListUpdatedEventRequest;
use Alexa\Model\Services\ReminderManagement\ReminderCreatedEventRequest;
use Alexa\Model\Services\ReminderManagement\ReminderDeletedEventRequest;
use Alexa\Model\Services\ReminderManagement\ReminderStartedEventRequest;
use Alexa\Model\Services\ReminderManagement\ReminderStatusChangedEventRequest;
use Alexa\Model\Services\ReminderManagement\ReminderUpdatedEventRequest;
use \DateTime;
use \JsonSerializable;

abstract class Request implements JsonSerializable
{
    /** @var string|null */
    protected $type = null;

    /** @var string|null */
    protected $requestId = null;

    /** @var DateTime|null */
    protected $timestamp = null;

    /** @var string|null */
    protected $locale = null;

    protected function __construct()
    {
    }

    /**
     * @return string|null
     */
    public function type()
    {
        return $this->type;
    }

    /**
     * @return string|null
     */
    public function requestId()
    {
        return $this->requestId;
    }

    /**
     * @return DateTime|null
     */
    public function timestamp()
    {
        return $this->timestamp;
    }

    /**
     * @return string|null
     */
    public function locale()
    {
        return $this->locale;
    }

    /**
     * @param array $data
     * @return self|null
     */
    public static function fromValue(array $data)
    {
        if (!isset($data['type'])) {
            return null;
        }
        $instance = null;
        switch ($data['type']) {
            case PlaybackFinishedRequest::TYPE:
                $instance = PlaybackFinishedRequest::fromValue($data);
                break;
            case SkillEnabledRequest::TYPE:
                $instance = SkillEnabledRequest::fromValue($data);
                break;
            case ListUpdatedEventRequest::TYPE:
                $instance = ListUpdatedEventRequest::fromValue($data);
                break;
            case ProactiveSubscriptionChangedRequest::TYPE:
                $instance = ProactiveSubscriptionChangedRequest::fromValue($data);
                break;
            case UserEvent::TYPE:
                $instance = UserEvent::fromValue($data);
                break;
            case SkillDisabledRequest::TYPE:
                $instance = SkillDisabledRequest::fromValue($data);
                break;
            case ElementSelectedRequest::TYPE:
                $instance = ElementSelectedRequest::fromValue($data);
                break;
            case PermissionChangedRequest::TYPE:
                $instance = PermissionChangedRequest::fromValue($data);
                break;
            case ListItemsCreatedEventRequest::TYPE:
                $instance = ListItemsCreatedEventRequest::fromValue($data);
                break;
            case ReminderUpdatedEventRequest::TYPE:
                $instance = ReminderUpdatedEventRequest::fromValue($data);
                break;
            case SessionEndedRequest::TYPE:
                $instance = SessionEndedRequest::fromValue($data);
                break;
            case IntentRequest::TYPE:
                $instance = IntentRequest::fromValue($data);
                break;
            case PlaybackFailedRequest::TYPE:
                $instance = PlaybackFailedRequest::fromValue($data);
                break;
            case CanFulfillIntentRequest::TYPE:
                $instance = CanFulfillIntentRequest::fromValue($data);
                break;
            case ReminderStartedEventRequest::TYPE:
                $instance = ReminderStartedEventRequest::fromValue($data);
                break;
            case LaunchRequest::TYPE:
                $instance = LaunchRequest::fromValue($data);
                break;
            case ReminderCreatedEventRequest::TYPE:
                $instance = ReminderCreatedEventRequest::fromValue($data);
                break;
            case PlaybackStoppedRequest::TYPE:
                $instance = PlaybackStoppedRequest::fromValue($data);
                break;
            case PreviousCommandIssuedRequest::TYPE:
                $instance = PreviousCommandIssuedRequest::fromValue($data);
                break;
            case ListItemsUpdatedEventRequest::TYPE:
                $instance = ListItemsUpdatedEventRequest::fromValue($data);
                break;
            case AccountLinkedRequest::TYPE:
                $instance = AccountLinkedRequest::fromValue($data);
                break;
            case ListCreatedEventRequest::TYPE:
                $instance = ListCreatedEventRequest::fromValue($data);
                break;
            case PlaybackStartedRequest::TYPE:
                $instance = PlaybackStartedRequest::fromValue($data);
                break;
            case PlaybackNearlyFinishedRequest::TYPE:
                $instance = PlaybackNearlyFinishedRequest::fromValue($data);
                break;
            case ReminderStatusChangedEventRequest::TYPE:
                $instance = ReminderStatusChangedEventRequest::fromValue($data);
                break;
            case ListItemsDeletedEventRequest::TYPE:
                $instance = ListItemsDeletedEventRequest::fromValue($data);
                break;
            case ReminderDeletedEventRequest::TYPE:
                $instance = ReminderDeletedEventRequest::fromValue($data);
                break;
            case ConnectionsResponse::TYPE:
                $instance = ConnectionsResponse::fromValue($data);
                break;
            case MessageReceivedRequest::TYPE:
                $instance = MessageReceivedRequest::fromValue($data);
                break;
            case ConnectionsRequest::TYPE:
                $instance = ConnectionsRequest::fromValue($data);
                break;
            case ExceptionEncounteredRequest::TYPE:
                $instance = ExceptionEncounteredRequest::fromValue($data);
                break;
            case PermissionAcceptedRequest::TYPE:
                $instance = PermissionAcceptedRequest::fromValue($data);
                break;
            case ListDeletedEventRequest::TYPE:
                $instance = ListDeletedEventRequest::fromValue($data);
                break;
            case InputHandlerEventRequest::TYPE:
                $instance = InputHandlerEventRequest::fromValue($data);
                break;
            case NextCommandIssuedRequest::TYPE:
                $instance = NextCommandIssuedRequest::fromValue($data);
                break;
            case PauseCommandIssuedRequest::TYPE:
                $instance = PauseCommandIssuedRequest::fromValue($data);
                break;
            case PlayCommandIssuedRequest::TYPE:
                $instance = PlayCommandIssuedRequest::fromValue($data);
                break;
        }
        if ($instance !== null) {
            $instance->requestId = $data['requestId'];
            $instance->timestamp = $data['timestamp'];
            $instance->locale = $data['locale'];
        }
        return $instance;
    }
}
