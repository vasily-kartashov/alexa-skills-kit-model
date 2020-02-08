Alexa Skill Kit Model
===

[![Build Status](https://travis-ci.org/vasily-kartashov/alexa-skills-kit-model.svg?branch=master)](https://travis-ci.org/vasily-kartashov/alexa-skills-kit-model)

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
$speech = PlainTextOutputSpeech::ofText("Plain text string to speak");
    
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

Use `"vasily-kartashov/alexa-skills-kit-model"`


ToDo
---

- Move to `hamlet-framework/alexa-skill-kit-model`
- Rebuild repository by retrospectively generating all previous versions as well
- Add doc parser https://stackoverflow.com/questions/8504013/how-to-read-javadoc-comments-by-reflection to copy paths
- Use DateTimeImmutable as much as possible

