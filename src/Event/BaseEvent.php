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
    /**
     * @var int
     */
    protected $eventId;

    /**
     * @var Actor
     */
    protected $actor;

    /**
     * @var Repository
     */
    protected $repository;

    /**
     * @var \DateTime
     */
    protected $createdTime;

    /**
     * @param int $eventId
     */
    public function __construct($eventId)
    {
        $this->eventId = (int) $eventId;
    }

    /**
     * @return int
     */
    public function getEventId()
    {
        return $this->eventId;
    }

    /**
     * @param Actor $actor
     */
    public function setActor(Actor $actor)
    {
        $this->actor = $actor;
    }

    /**
     * @return Actor
     */
    public function getActor()
    {
        return $this->actor;
    }

    /**
     * @param Repository $repository
     */
    public function setRepository(Repository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return Repository
     */
    public function getRepository()
    {
        return $this->repository;
    }

    /**
     * @param int $time
     */
    public function setTime($time)
    {
        $this->createdTime = new \DateTime($time);
    }

    /**
     * @return \DateTime
     */
    public function getCreatedTime()
    {
        return $this->createdTime;
    }

    /**
     * @return int
     */
    public function getYear()
    {
        return (int) $this->createdTime->format('Y');
    }

    /**
     * @return int
     */
    public function getDay()
    {
        return (int) $this->createdTime->format('d');
    }

    /**
     * @return int
     */
    public function getMonth()
    {
        return (int) $this->createdTime->format('m');
    }

    /**
     * @return int
     */
    public function getHour()
    {
        return (int) $this->createdTime->format('H');
    }

    /**
     * @return int
     */
    public function getMinute()
    {
        return (int) $this->createdTime->format('i');
    }
}
