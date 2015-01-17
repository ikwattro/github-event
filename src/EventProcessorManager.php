<?php

/**
 * This file is part of the GithubEvent package.
 * 
 * (c) Christophe Willemsen <chris@neoxygen.io>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @license MIT License
 */

namespace Ikwattro\GithubEvent;

use Ikwattro\GithubEvent\EventProcessor\EventProcessorInterface,
    Ikwattro\GithubEvent\Exception\EventNotHandledException;
use Ikwattro\GithubEvent\EventProcessor\WatchEventProcessor;

class EventProcessorManager
{
    protected $eventProcessors = [];

    public function __construct()
    {
        $this->registerEventProcessor(new WatchEventProcessor());
    }

    public function registerEventProcessor(EventProcessorInterface $eventProcessor)
    {
        $this->eventProcessors[$eventProcessor::getEventType()] = $eventProcessor;
    }

    public function getProcessorForEvent($event)
    {
        if (!array_key_exists($event, $this->eventProcessors)) {
            throw new EventNotHandledException(sprintf('No Event Processor found for event "%s"', $event));
        }

        return $this->eventProcessors[$event];
    }
}