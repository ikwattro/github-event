<?php

/**
* This file is part of the GithubEvent package
*
* (c) Christophe Willemsen <chris@neoxygen.io>
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*
*/

namespace Ikwattro\GithubEvent\EventProcessor;

use Ikwattro\GithubEvent\Event\Branch;
use Ikwattro\GithubEvent\Event\PullRequest;
use Ikwattro\GithubEvent\Event\PullRequestEvent;
use Ikwattro\GithubEvent\Event\Repository;
use Ikwattro\GithubEvent\Event\User;

class PullRequestEventProcessor extends AbstractEventProcessor
{
    const EVENT_TYPE = 'PullRequestEvent';

    public static function getEventType()
    {
        return self::EVENT_TYPE;
    }

    public function processEvent(array $event)
    {
        $e = new PullRequestEvent($this->getEventId($event));
        $this->handleBase($event, $e);
        $e->setAction($event['payload']['action']);
        $e->setPullRequest($this->processPr($event['payload']['pull_request']));

        return $e;
    }

    private function processBranch(array $branch)
    {
        $b = new Branch();
        $b->setLabel($branch['label']);
        $b->setReferenceName($branch['ref']);
        $u = new User($branch['user']['id'], $branch['user']['login'], $branch['user']['type']);
        $b->setUser($u);
        if (!empty($branch['repo'])) {
            $repo = new Repository($branch['repo']['id'], $branch['repo']['name']);
            $owner = new User($branch['repo']['owner']['id'], $branch['repo']['owner']['login'], $branch['repo']['owner']['type']);
        } else {
            $repoId = crc32($u->getLogin() . $b->getLabel());
            $repoName = $b->getLabel();
            $repo = new Repository($repoId, $repoName);
            $owner = new User($u->getId(), $u->getLogin(), $branch['user']['type']);
        }
        $repo->setOwner($owner);
        $b->setRepository($repo);

        return $b;
    }

    private function processPr(array $payload)
    {
        $pr = new PullRequest();
        $pr->setId($payload['id']);
        $pr->setNumber($payload['number']);
        $pr->setState($payload['state']);
        $u = new User($payload['user']['id'], $payload['user']['login'],$payload['user']['type']);
        $pr->setUser($u);
        $pr->setTitle($payload['title']);
        $pr->setBody($payload['body']);
        $pr->setCreatedAt($payload['created_at']);
        $pr->setUpdatedAt($payload['updated_at']);
        $pr->setClosedAt($payload['closed_at']);
        $pr->setMergedAt($payload['merged_at']);
        $pr->setHead($this->processBranch($payload['head']));
        $pr->setBase($this->processBranch($payload['base']));
        if (1 == $payload['merged']) {
            $pr->setMerged();
        }

        return $pr;
    }

}