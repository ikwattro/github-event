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

namespace Ikwattro\GithubEvent\Event;

class BaseEvent
{
    protected $eventId;

    protected $actor;

    protected $repository;

    public function __construct($eventId)
    {
        $this->eventId = (int) $eventId;
    }

    public function getEventId()
    {
        return $this->eventId;
    }

    public function setActor(Actor $actor)
    {
        $this->actor = $actor;
    }

    public function getActor()
    {
        return $this->actor;
    }

    public function setRepository(Repository $repository)
    {
        $this->repository = $repository;
    }

    public function getRepository()
    {
        return $this->repository;
    }
}
