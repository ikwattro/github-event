<?php

namespace Ikwattro\GithubEvent\Tests;

use Ikwattro\GithubEvent\EventHandler;

class EventHandlerTest extends \PHPUnit_Framework_TestCase
{
    public function testBuild()
    {
        $handler = EventHandler::create()
            ->build();
        $this->assertInstanceOf('Ikwattro\GithubEvent\EventHandler', $handler);
    }

    public function testProcessorManagerIsAccessible()
    {
        $handler = EventHandler::create()
            ->build();

        $this->assertInstanceOf('Ikwattro\GithubEvent\EventProcessorManager', $handler->getEventProcessorManager());
    }


}