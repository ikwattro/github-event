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

use Ikwattro\GithubEvent\Event\WatchEvent;
use Ikwattro\GithubEvent\Exception\InvalidEventException;

class WatchEventProcessor extends AbstractEventProcessor
{
    const EVENT_TYPE = 'WatchEvent';

    public static function getEventType()
    {
        return self::EVENT_TYPE;
    }

    public function processEvent(array $event)
    {
        $e = new WatchEvent($this->getEventId($event));
        $e->setActor($this->getActor($event));
        $e->setRepository($this->getRepository($event));
        $e->setWatched($this->isWatched($event));
        $e->setTime($event['created_at']);

        return $e;
    }

    public function isWatched(array $event)
    {
        if (!isset($event['payload']['action'])) {
            throw new InvalidEventException(sprintf('Unable to determine if WatchEvent with ID "%d" is watched or unwatched', $this->getEventId($event)));
        }

        if ('started' === $event['payload']['action']) {
            return true;
        }

        return false;
    }
}
