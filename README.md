Alexa Skill Kit Model
===

[![Build Status](https://travis-ci.org/vasily-kartashov/alexa-skill-kit-model.svg)](https://travis-ci.org/vasily-kartashov/alexa-skill-kit-model)

This is a mapping between Alexa's request and response envelopes and PHP classes. 
There model library doesn't do any processing and is solely responsible for mapping only.

Reading request envelope
---

To read a json request execute

```php
$data = json_decode($payload, true);
$envelope = RequestEnvelope::fromValue($data);
```

Writing response envelope
---

To create a json response use respective builders

```php
$speech = PlainTextOutputSpeech::builder()
    ->withText("Plain text string to speak")
    ->build();
    
$response = Response::builder()
    ->withOutputSpeech($speech)
    ->withShouldEndSession(true)
    ->build();
    
$envelope = ResponseEnvelope::builder()
    ->withVersion("string")
    ->withResponse($response)
    ->build();
    
$payload = json_encode($envelope);
```

Composer
---

Use `"vasily-kartashov/alexa-skill-kit-model"`
