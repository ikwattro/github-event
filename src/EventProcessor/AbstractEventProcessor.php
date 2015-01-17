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

namespace Ikwattro\GithubEvent\EventProcessor;

use Ikwattro\GithubEvent\Event\Actor;
use Ikwattro\GithubEvent\Event\Repository;
use Ikwattro\GithubEvent\Exception\InvalidEventException;

abstract class AbstractEventProcessor implements EventProcessorInterface
{
    public function getActor(array $eventInfo)
    {
        if (!isset($eventInfo['actor']['id']) || !isset($eventInfo['actor']['login'])) {
            throw new InvalidEventException('Unable to retrieve Actor informations from the event payload');
        }

        return new Actor($eventInfo['actor']['id'], $eventInfo['actor']['login']);
    }

    public function getEventId(array $eventInfo)
    {
        return $eventInfo['id'];
    }

    public function getRepository(array $eventInfo)
    {
        if (!isset($eventInfo['repo'])) {
            throw new InvalidEventException(sprintf('Bad repository info for event ID "%d"', $this->getEventId($eventInfo)));
        }

        $repo = $eventInfo['repo'];
        $repository = new Repository($repo['id'], $repo['name']);

        return $repository;
    }
}