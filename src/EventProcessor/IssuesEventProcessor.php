<?php

/**
 * This file is part of the GithubEvent package.
 *
 * (c) Christophe Willemsen <chris@neoxygen.io>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ikwattro\GithubEvent\EventProcessor;

use Ikwattro\GithubEvent\Event\Issue;
use Ikwattro\GithubEvent\Event\IssuesEvent;
use Ikwattro\GithubEvent\Event\User;

class IssuesEventProcessor extends AbstractEventProcessor
{
  const EVENT_TYPE = 'IssuesEvent';

    public static function getEventType()
    {
        return self::EVENT_TYPE;
    }

    public function processEvent(array $event)
    {
        $e = new IssuesEvent($this->getEventId($event));
        $this->handleBase($event, $e);
        $e->setIssue($this->getIssue($event));
        $e->setAction($this->getIssueAction($event));

        return $e;
    }

    public function getIssue(array $event)
    {
        $issue = new Issue($event['payload']['issue']['id'], $event['payload']['issue']['number']);
        $issue->setTitle($event['payload']['issue']['title']);
        $issue->setBody($event['payload']['issue']['body']);
        $issue->setCreationTime($event['payload']['issue']['created_at']);
        $issue->setState($event['payload']['issue']['state']);
        $issue->setAuthor(new User($event['payload']['issue']['user']['id'], $event['payload']['issue']['user']['login'],
          $event['payload']['issue']['user']['type']));

        return $issue;
    }

    public function getIssueAction(array $event)
    {
        return $event['payload']['action'];
    }

    public function getIssueState(array $eventInfo)
    {
        return $eventInfo['payload']['issue']['state'];
    }
}
