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

    protected $createdTime;

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

    public function setTime($time)
    {
        $this->createdTime = new \DateTime($time);
    }

    public function getCreatedTime()
    {
        return $this->createdTime;
    }

    public function getYear()
    {
        return (int) $this->createdTime->format('Y');
    }

    public function getDay()
    {
        return (int) $this->createdTime->format('d');
    }

    public function getMonth()
    {
        return (int) $this->createdTime->format('m');
    }

    public function getHour()
    {
        return (int) $this->createdTime->format('H');
    }

    public function getMinute()
    {
        return (int) $this->createdTime->format('i');
    }
}
