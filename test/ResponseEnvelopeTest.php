<?php

namespace Alexa\Model;

use Alexa\Model\Interfaces\Connections\SendRequestDirective;
use Alexa\Model\UI\Image;
use Alexa\Model\UI\PlainTextOutputSpeech;
use Alexa\Model\UI\StandardCard;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class ResponseEnvelopeTest extends TestCase
{
    public function testSimpleResponseGeneration()
    {
        $speech = PlainTextOutputSpeech::builder()
            ->withText("Plain text string to speak")
            ->build();

        $image = Image::builder()
            ->withLargeImageUrl("https://large-image")
            ->withSmallImageUrl("https://small-image")
            ->build();

        $card = StandardCard::builder()
            ->withTitle("Title of the card")
            ->withText("Text content for a standard card")
            ->withImage($image)
            ->build();

        $response = Response::builder()
            ->withOutputSpeech($speech)
            ->withCard($card)
            ->withDirectives([
                SendRequestDirective::builder()->build()
            ])
            ->withShouldEndSession(true)
            ->build();

        $envelope = ResponseEnvelope::builder()
            ->withVersion("string")
            ->withSessionAttributes([
                "key" => "value"
            ])
            ->withResponse($response)
            ->build();

        $payload = json_encode($envelope, JSON_PRETTY_PRINT);
        $example = trim(file_get_contents(__DIR__ . '/responses/response-01.json'));

        Assert::assertEquals($example, $payload);
    }
}
