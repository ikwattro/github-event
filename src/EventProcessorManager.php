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

use Ikwattro\GithubEvent\EventProcessor\EventProcessorInterface;
use Ikwattro\GithubEvent\Exception\EventNotHandledException;
use Ikwattro\GithubEvent\EventProcessor\WatchEventProcessor;
use Ikwattro\GithubEvent\EventProcessor\CreateEventProcessor;
use Ikwattro\GithubEvent\EventProcessor\IssuesEventProcessor;
use Ikwattro\GithubEvent\EventProcessor\IssueCommentEventProcessor;
use Ikwattro\GithubEvent\EventProcessor\PushEventProcessor;
use Ikwattro\GithubEvent\EventProcessor\PullRequestEventProcessor;

class EventProcessorManager
{
    protected $eventProcessors = [];

    public function __construct()
    {
        $this->registerEventProcessor(new WatchEventProcessor());
        $this->registerEventProcessor(new CreateEventProcessor());
        $this->registerEventProcessor(new IssuesEventProcessor());
        $this->registerEventProcessor(new IssueCommentEventProcessor());
        $this->registerEventProcessor(new PushEventProcessor());
        $this->registerEventProcessor(new PullRequestEventProcessor());
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
