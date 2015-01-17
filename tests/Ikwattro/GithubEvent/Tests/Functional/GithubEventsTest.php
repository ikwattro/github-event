<?php

namespace Ikwattro\GithubEvent\Tests\Functional;

use Ikwattro\GithubEvent\EventHandler;

class WatchEventTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Ikwattro\GithubEvent\EventHandler
     */
    protected $handler;

    /**
     * @var array
     */
    protected $events;

    public function setUp()
    {
        $this->handler = EventHandler::create()
            ->build();

        $this->events = json_decode(file_get_contents(__DIR__.'/../events.json'), true);
    }

    public function testWatchEventIsHandled()
    {
        $event = $this->events[0];
        $eventO = $this->handler->handleEvent($event);
        $this->assertInstanceOf('Ikwattro\GithubEvent\Event\WatchEvent', $eventO);
        $this->assertTrue($eventO->isWatched());
        $this->assertEquals('ikwattro', $eventO->getActor()->getLogin());
        $this->assertEquals('apcj/query-plan-viz', $eventO->getRepository()->getName());
    }

    public function testCreateEventIsHandled()
    {
        $event = $this->events[5];
        $eventO = $this->handler->handleEvent($event);
        $this->assertInstanceOf('Ikwattro\GithubEvent\Event\CreateEvent', $eventO);
        $this->assertTrue($eventO->isNewTag());
        $this->assertEquals('neoxygen/neo4j-neoclient', $eventO->getRepository()->getName());
        $this->assertEquals('2.0.10', $eventO->getNewTagName());
    }
}