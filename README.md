# GithubEvent

## Github Api Public Events to PHP Objects

Transforms the [Github API Public Events](https://developer.github.com/v3/activity/events/types/) into PHP Objects

### Installation

Require the library in your `composer.json`

```bash
composer require ikwattro/github-even
```

### Usage

#### Building the EventHandler

The application need to be built through the factory constructor, currently there is no need for such factory design but it aims to be
extensible for future usages.

```php

use Ikwattro\GithubEvent\EventHandler;

$eventHandler = EventHandler::create()
                ->build();

```

#### Passing events

The mainpoint of the library is the `handleEvent` method that takes the GithubEvent as argument in an array format (json_decoded).

Once passed, you'll receive in return the corresponding PHP Object instance corresponding to the event.

```php
$events = json_decode('events.json', true);

foreach ($events as $e) {
    $event = $eventHandler->handleEvent($e);
}
```

#### Working with Events

An event object may contain more than the current event, for e.g., a `CreateEvent` will contain the payload of the event, but also 
the associated Repository object, RepositoryOwner, ... .

Please refer to the source code for discovering what is inside each event.

#### Currently supported events

* WatchEvent
* IssuesEvent
* IssueCommentEvent
* CreateEvent

---

### License

The library is licensed under the MIT License

### Author

[Christophe Willemsen](https://github.com/ikwattro)
[Twitter: @ikwattro](https://twitter.com/ikwattro)