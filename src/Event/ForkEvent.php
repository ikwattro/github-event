<?php

/**
 * This file is part of the GithubEvent package.
 *
 * (c) Christophe Willemsen <chris@neoxygen.io>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ikwattro\GithubEvent\Event;

class ForkEvent extends BaseEvent {

    const EVENT_TYPE = 'ForkEvent';

    protected $repository;

    protected $forkee;

    public function getEventType() {
        return self::EVENT_TYPE;
    }

    public function setRepository(Repository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return mixed
     */
    public function getRepository() {
        return $this->repository;
    }

    /**
     * @return mixed
     */
    public function getForkee() {
        return $this->forkee;
    }

    /**
     * @param mixed $forkee
     */
    public function setForkee(Repository $forkee) {
        $this->forkee = $forkee;
    }
}