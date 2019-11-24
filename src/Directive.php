<?php

namespace Alexa\Model;

use Alexa\Model\Dialog\ConfirmIntentDirective;
use Alexa\Model\Dialog\ConfirmSlotDirective;
use Alexa\Model\Dialog\DelegateDirective;
use Alexa\Model\Dialog\DynamicEntitiesDirective;
use Alexa\Model\Dialog\ElicitSlotDirective;
use Alexa\Model\Interfaces\Alexa\Presentation\APLT\ApltExecuteCommandsDirective;
use Alexa\Model\Interfaces\Alexa\Presentation\APLT\RenderDocumentDirective;
use Alexa\Model\Interfaces\Alexa\Presentation\APL\AplExecuteCommandsDirective;
use Alexa\Model\Interfaces\Alexa\Presentation\APL\AplRenderDocumentDirective;
use Alexa\Model\Interfaces\Alexa\Presentation\Html\HandleMessageDirective;
use Alexa\Model\Interfaces\Alexa\Presentation\Html\StartDirective;
use Alexa\Model\Interfaces\AudioPlayer\ClearQueueDirective;
use Alexa\Model\Interfaces\AudioPlayer\PlayDirective;
use Alexa\Model\Interfaces\AudioPlayer\StopDirective;
use Alexa\Model\Interfaces\Connections\SendRequestDirective;
use Alexa\Model\Interfaces\Connections\SendResponseDirective;
use Alexa\Model\Interfaces\Connections\V1\StartConnectionDirective;
use Alexa\Model\Interfaces\CustomInterfaceController\SendDirectiveDirective;
use Alexa\Model\Interfaces\CustomInterfaceController\StartEventHandlerDirective;
use Alexa\Model\Interfaces\CustomInterfaceController\StopEventHandlerDirective;
use Alexa\Model\Interfaces\Display\HintDirective;
use Alexa\Model\Interfaces\Display\RenderTemplateDirective;
use Alexa\Model\Interfaces\GadgetController\SetLightDirective;
use Alexa\Model\Interfaces\GameEngine\StartInputHandlerDirective;
use Alexa\Model\Interfaces\GameEngine\StopInputHandlerDirective;
use Alexa\Model\Interfaces\Navigation\Assistance\AnnounceRoadRegulation;
use Alexa\Model\Interfaces\Tasks\CompleteTaskDirective;
use Alexa\Model\Interfaces\VideoApp\LaunchDirective;
use \JsonSerializable;

abstract class Directive implements JsonSerializable
{
    /** @var string|null */
    protected $type = null;

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
            case StopEventHandlerDirective::TYPE:
                $instance = StopEventHandlerDirective::fromValue($data);
                break;
            case AnnounceRoadRegulation::TYPE:
                $instance = AnnounceRoadRegulation::fromValue($data);
                break;
            case SendRequestDirective::TYPE:
                $instance = SendRequestDirective::fromValue($data);
                break;
            case DynamicEntitiesDirective::TYPE:
                $instance = DynamicEntitiesDirective::fromValue($data);
                break;
            case StartEventHandlerDirective::TYPE:
                $instance = StartEventHandlerDirective::fromValue($data);
                break;
            case SetLightDirective::TYPE:
                $instance = SetLightDirective::fromValue($data);
                break;
            case DelegateDirective::TYPE:
                $instance = DelegateDirective::fromValue($data);
                break;
            case ConfirmIntentDirective::TYPE:
                $instance = ConfirmIntentDirective::fromValue($data);
                break;
            case SendDirectiveDirective::TYPE:
                $instance = SendDirectiveDirective::fromValue($data);
                break;
            case HandleMessageDirective::TYPE:
                $instance = HandleMessageDirective::fromValue($data);
                break;
            case ElicitSlotDirective::TYPE:
                $instance = ElicitSlotDirective::fromValue($data);
                break;
            case StartDirective::TYPE:
                $instance = StartDirective::fromValue($data);
                break;
            case StopDirective::TYPE:
                $instance = StopDirective::fromValue($data);
                break;
            case ConfirmSlotDirective::TYPE:
                $instance = ConfirmSlotDirective::fromValue($data);
                break;
            case PlayDirective::TYPE:
                $instance = PlayDirective::fromValue($data);
                break;
            case AplExecuteCommandsDirective::TYPE:
                $instance = AplExecuteCommandsDirective::fromValue($data);
                break;
            case RenderTemplateDirective::TYPE:
                $instance = RenderTemplateDirective::fromValue($data);
                break;
            case HintDirective::TYPE:
                $instance = HintDirective::fromValue($data);
                break;
            case StartConnectionDirective::TYPE:
                $instance = StartConnectionDirective::fromValue($data);
                break;
            case RenderDocumentDirective::TYPE:
                $instance = RenderDocumentDirective::fromValue($data);
                break;
            case StartInputHandlerDirective::TYPE:
                $instance = StartInputHandlerDirective::fromValue($data);
                break;
            case LaunchDirective::TYPE:
                $instance = LaunchDirective::fromValue($data);
                break;
            case ApltExecuteCommandsDirective::TYPE:
                $instance = ApltExecuteCommandsDirective::fromValue($data);
                break;
            case StopInputHandlerDirective::TYPE:
                $instance = StopInputHandlerDirective::fromValue($data);
                break;
            case CompleteTaskDirective::TYPE:
                $instance = CompleteTaskDirective::fromValue($data);
                break;
            case AplRenderDocumentDirective::TYPE:
                $instance = AplRenderDocumentDirective::fromValue($data);
                break;
            case SendResponseDirective::TYPE:
                $instance = SendResponseDirective::fromValue($data);
                break;
            case ClearQueueDirective::TYPE:
                $instance = ClearQueueDirective::fromValue($data);
                break;
        }
        return $instance;
    }
}
