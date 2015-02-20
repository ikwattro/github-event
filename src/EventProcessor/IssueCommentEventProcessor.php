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

use Ikwattro\GithubEvent\Event\IssueCommentEvent;
use Ikwattro\GithubEvent\Event\User;

class IssueCommentEventProcessor extends IssuesEventProcessor
{
    const EVENT_TYPE = 'IssueCommentEvent';

    public static function getEventType()
    {
        return self::EVENT_TYPE;
    }

    public function processEvent(array $event)
    {
        $e = new IssueCommentEvent($this->getEventId($event));
        $this->handleBase($event, $e);
        $e->setIssue($this->getIssue($event));
        $e->setComment($this->getIssueComment($event));
        $e->setCommentAuthor($this->getCommentAuthor($event));

        return $e;
    }

    public function getIssueComment(array $eventInfo)
    {
        $comment = $eventInfo['payload']['comment']['body'];

        return $comment;
    }

    public function getCommentAuthor(array $eventInfo)
    {
        $user = $eventInfo['payload']['comment']['user'];
        $u = new User($user['id'], $user['login'], $user['type']);

        return $u;
    }
}
