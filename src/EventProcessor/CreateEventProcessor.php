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

use Ikwattro\GithubEvent\Event\CreateEvent;

class CreateEventProcessor extends AbstractEventProcessor
{
    const EVENT_TYPE = 'CreateEvent';

    public static function getEventType()
    {
        return self::EVENT_TYPE;
    }

    public function processEvent(array $event)
    {
        $e = new CreateEvent($this->getEventId($event));
        $this->handleBase($event, $e);
        $e->setType($this->getCreationType($event));
        $e->setReference($this->getReference($event));
        $e->setMasterBranch($this->getMasterBranch($event));

        return $e;
    }

    public function getCreationType(array $eventInfo)
    {
        return $eventInfo['payload']['ref_type'];
    }

    public function getReference(array $eventInfo)
    {
        if (!isset($eventInfo['payload']['ref']) || $eventInfo['payload']['ref'] == '') {
            return;
        }

        return $eventInfo['payload']['ref'];
    }

    public function getDescription(array $eventInfo)
    {
        if (!isset($eventInfo['payload']['description']) || $eventInfo['payload']['description'] == '') {
            return;
        }

        return $eventInfo['payload']['description'];
    }

    public function getMasterBranch(array $eventInfo)
    {
        return $eventInfo['payload']['master_branch'];
    }
}
