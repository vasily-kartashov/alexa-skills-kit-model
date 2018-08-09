<?php

namespace Alexa\Model;

use Alexa\Model\Events\SkillEvents\AccountLinkedRequest;
use Alexa\Model\Events\SkillEvents\PermissionAcceptedRequest;
use Alexa\Model\Events\SkillEvents\PermissionChangedRequest;
use Alexa\Model\Events\SkillEvents\SkillDisabledRequest;
use Alexa\Model\Events\SkillEvents\SkillEnabledRequest;
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

    public static function fromValue(array $data)
    {
        switch ($data['type']) {
            case PlaybackStoppedRequest::TYPE:
                return PlaybackStoppedRequest::fromValue($data);
            case PlaybackFinishedRequest::TYPE:
                return PlaybackFinishedRequest::fromValue($data);
            case SkillEnabledRequest::TYPE:
                return SkillEnabledRequest::fromValue($data);
            case ListUpdatedEventRequest::TYPE:
                return ListUpdatedEventRequest::fromValue($data);
            case PreviousCommandIssuedRequest::TYPE:
                return PreviousCommandIssuedRequest::fromValue($data);
            case SkillDisabledRequest::TYPE:
                return SkillDisabledRequest::fromValue($data);
            case ElementSelectedRequest::TYPE:
                return ElementSelectedRequest::fromValue($data);
            case ListItemsUpdatedEventRequest::TYPE:
                return ListItemsUpdatedEventRequest::fromValue($data);
            case PermissionChangedRequest::TYPE:
                return PermissionChangedRequest::fromValue($data);
            case ListItemsCreatedEventRequest::TYPE:
                return ListItemsCreatedEventRequest::fromValue($data);
            case AccountLinkedRequest::TYPE:
                return AccountLinkedRequest::fromValue($data);
            case SessionEndedRequest::TYPE:
                return SessionEndedRequest::fromValue($data);
            case ListCreatedEventRequest::TYPE:
                return ListCreatedEventRequest::fromValue($data);
            case PlaybackStartedRequest::TYPE:
                return PlaybackStartedRequest::fromValue($data);
            case IntentRequest::TYPE:
                return IntentRequest::fromValue($data);
            case PlaybackNearlyFinishedRequest::TYPE:
                return PlaybackNearlyFinishedRequest::fromValue($data);
            case ListItemsDeletedEventRequest::TYPE:
                return ListItemsDeletedEventRequest::fromValue($data);
            case ConnectionsResponse::TYPE:
                return ConnectionsResponse::fromValue($data);
            case MessageReceivedRequest::TYPE:
                return MessageReceivedRequest::fromValue($data);
            case PlaybackFailedRequest::TYPE:
                return PlaybackFailedRequest::fromValue($data);
            case ConnectionsRequest::TYPE:
                return ConnectionsRequest::fromValue($data);
            case ExceptionEncounteredRequest::TYPE:
                return ExceptionEncounteredRequest::fromValue($data);
            case PermissionAcceptedRequest::TYPE:
                return PermissionAcceptedRequest::fromValue($data);
            case ListDeletedEventRequest::TYPE:
                return ListDeletedEventRequest::fromValue($data);
            case InputHandlerEventRequest::TYPE:
                return InputHandlerEventRequest::fromValue($data);
            case NextCommandIssuedRequest::TYPE:
                return NextCommandIssuedRequest::fromValue($data);
            case PauseCommandIssuedRequest::TYPE:
                return PauseCommandIssuedRequest::fromValue($data);
            case PlayCommandIssuedRequest::TYPE:
                return PlayCommandIssuedRequest::fromValue($data);
            case LaunchRequest::TYPE:
                return LaunchRequest::fromValue($data);
            default:
                return null;
        }
    }
}
