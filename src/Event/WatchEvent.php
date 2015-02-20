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

class WatchEvent extends BaseEvent
{
    /**
     * Event Type.
     */
    const EVENT_TYPE = 'WatchEvent';

    /**
     * @var bool
     */
    protected $isWatched = true;

    /**
     * Returns the Event Type.
     *
     * @return string
     */
    public function getEventType()
    {
        return self::EVENT_TYPE;
    }

    /**
     * @param bool $isWatched
     */
    public function setWatched($isWatched = true)
    {
        $this->isWatched = (bool) $isWatched;
    }

    /**
     * @return bool
     */
    public function isWatched()
    {
        return $this->isWatched;
    }
}
