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

use Ikwattro\GithubEvent\Event\ForkEvent;
use Ikwattro\GithubEvent\Event\Repository;
use Ikwattro\GithubEvent\Event\User;

class ForkEventProcessor extends AbstractEventProcessor {
    const EVENT_TYPE = 'ForkEvent';

    public static function getEventType() {
        return self::EVENT_TYPE;
    }

    public function processEvent(array $event) {
        $e = new ForkEvent($this->getEventId($event));
        $this->handleBase($event, $e);
        $e->setRepository($this->getRepository($event));
        $e->setForkee($this->getForkeeInfo($event));
        return $e;
    }

    private function getForkeeInfo(array $event)
    {
        $owner = $event['payload']['forkee']['owner'];
        $ou = new User($owner['id'], $owner['login'], $owner['type']);
        $fork = new Repository($event['forkee']['id'], $event['forkee']['name']);
        $fork->setOwner($ou);

        return $fork;
    }
}