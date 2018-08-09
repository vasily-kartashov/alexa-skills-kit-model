<?php

namespace Alexa\Model;

use Alexa\Model\Interfaces\AudioPlayer\PlayerActivity;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class RequestEnvelopeTest extends TestCase
{
    public function testIntentRequestParsing()
    {
        $data = json_decode(file_get_contents(__DIR__ . '/requests/request-01.json'), true);
        $envelope = RequestEnvelope::fromValue($data);

        Assert::assertInstanceOf(RequestEnvelope::class, $envelope);

        $request = $envelope->request();
        Assert::assertInstanceOf(IntentRequest::class, $request);

        /** @var IntentRequest $request */
        Assert::assertEquals('virgo', $request->intent()->slots()[0]->value());
    }

    public function testSessionEndedRequestParsing()
    {
        $data = json_decode(file_get_contents(__DIR__ . '/requests/request-02.json'), true);
        $envelope = RequestEnvelope::fromValue($data);

        $request = $envelope->request();
        Assert::assertInstanceOf(SessionEndedRequest::class, $request);

        /** @var SessionEndedRequest $request */
        Assert::assertEquals(SessionEndedReason::USER_INITIATED(), $request->reason());
    }

    public function testContextParsing()
    {
        $data = json_decode(file_get_contents(__DIR__ . '/requests/request-03.json'), true);
        $envelope = RequestEnvelope::fromValue($data);

        Assert::assertEquals(PlayerActivity::PLAYING(), $envelope->context()->AudioPlayer()->playerActivity());
    }
}
