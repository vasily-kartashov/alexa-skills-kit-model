<?php

namespace Alexa\Model;

use Alexa\Model\Dialog\ConfirmIntentDirective;
use Alexa\Model\Dialog\ConfirmSlotDirective;
use Alexa\Model\Dialog\DelegateDirective;
use Alexa\Model\Dialog\ElicitSlotDirective;
use Alexa\Model\Interfaces\Alexa\Presentation\Apl\ExecuteCommandsDirective;
use Alexa\Model\Interfaces\Alexa\Presentation\Apl\RenderDocumentDirective;
use Alexa\Model\Interfaces\AudioPlayer\ClearQueueDirective;
use Alexa\Model\Interfaces\AudioPlayer\PlayDirective;
use Alexa\Model\Interfaces\AudioPlayer\StopDirective;
use Alexa\Model\Interfaces\Connections\SendRequestDirective;
use Alexa\Model\Interfaces\Connections\SendResponseDirective;
use Alexa\Model\Interfaces\Display\HintDirective;
use Alexa\Model\Interfaces\Display\RenderTemplateDirective;
use Alexa\Model\Interfaces\GadgetController\SetLightDirective;
use Alexa\Model\Interfaces\GameEngine\StartInputHandlerDirective;
use Alexa\Model\Interfaces\GameEngine\StopInputHandlerDirective;
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
            case StopDirective::TYPE:
                $instance = StopDirective::fromValue($data);
                break;
            case ConfirmSlotDirective::TYPE:
                $instance = ConfirmSlotDirective::fromValue($data);
                break;
            case PlayDirective::TYPE:
                $instance = PlayDirective::fromValue($data);
                break;
            case ExecuteCommandsDirective::TYPE:
                $instance = ExecuteCommandsDirective::fromValue($data);
                break;
            case SendRequestDirective::TYPE:
                $instance = SendRequestDirective::fromValue($data);
                break;
            case RenderTemplateDirective::TYPE:
                $instance = RenderTemplateDirective::fromValue($data);
                break;
            case SetLightDirective::TYPE:
                $instance = SetLightDirective::fromValue($data);
                break;
            case DelegateDirective::TYPE:
                $instance = DelegateDirective::fromValue($data);
                break;
            case HintDirective::TYPE:
                $instance = HintDirective::fromValue($data);
                break;
            case ConfirmIntentDirective::TYPE:
                $instance = ConfirmIntentDirective::fromValue($data);
                break;
            case StartInputHandlerDirective::TYPE:
                $instance = StartInputHandlerDirective::fromValue($data);
                break;
            case LaunchDirective::TYPE:
                $instance = LaunchDirective::fromValue($data);
                break;
            case StopInputHandlerDirective::TYPE:
                $instance = StopInputHandlerDirective::fromValue($data);
                break;
            case RenderDocumentDirective::TYPE:
                $instance = RenderDocumentDirective::fromValue($data);
                break;
            case SendResponseDirective::TYPE:
                $instance = SendResponseDirective::fromValue($data);
                break;
            case ElicitSlotDirective::TYPE:
                $instance = ElicitSlotDirective::fromValue($data);
                break;
            case ClearQueueDirective::TYPE:
                $instance = ClearQueueDirective::fromValue($data);
                break;
        }
        if ($instance !== null) {
        }
        return $instance;
    }
}
