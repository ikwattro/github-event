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

use Ikwattro\GithubEvent\Event\PushEvent;
use Ikwattro\GithubEvent\Event\Commit;

class PushEventProcessor extends AbstractEventProcessor
{
    const EVENT_TYPE = 'PushEvent';

    public static function getEventType()
    {
        return self::EVENT_TYPE;
    }

    public function processEvent(array $event)
    {
        $e = new PushEvent($this->getEventId($event));
        $this->handleBase($event, $e);
        $this->addCommits($event, $e);
        $e->setReference($event['payload']['ref']);

        return $e;
    }

    public function addCommits(array $event, PushEvent $pushEvent)
    {
        if (isset($event['payload']['commits'])) {
            foreach ($event['payload']['commits'] as $commit) {
                $c = new Commit();
                $c->setSha($commit['sha']);
                $c->setAuthorEmail($commit['author']['email']);
                $c->setAuthorName($commit['author']['name']);
                $c->setMessage($commit['message']);
                $pushEvent->addCommit($c);
            }
        }
    }
}
