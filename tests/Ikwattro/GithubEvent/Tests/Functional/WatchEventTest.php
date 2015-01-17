<?php

namespace Ikwattro\GithubEvent\Tests\Functional;

use Ikwattro\GithubEvent\EventHandler;

class WatchEventTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Ikwattro\GithubEvent\EventHandler
     */
    protected $handler;

    public function setUp()
    {
        $this->handler = EventHandler::create()
            ->build();
    }

    public function testWatchEventIsHandler()
    {
        $events = json_decode(file_get_contents(__DIR__.'/../events.json'), true);
        $event = $events[0];

        $eventO = $this->handler->handleEvent($event);
        $this->assertInstanceOf('Ikwattro\GithubEvent\Event\WatchEvent', $eventO);
        $this->assertTrue($eventO->isWatched());
        $this->assertEquals('ikwattro', $eventO->getActor()->getLogin());
        $this->assertEquals('apcj/query-plan-viz', $eventO->getRepository()->getName());
    }
}