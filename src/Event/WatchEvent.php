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

class WatchEvent extends BaseEvent
{

    const EVENT_TYPE = 'WatchEvent';

    protected $isWatched = true;

    public function getEventType()
    {
        return self::EVENT_TYPE;
    }

    public function setWatched($isWatched = true)
    {
        $this->isWatched = (bool) $isWatched;
    }

    public function isWatched()
    {
        return $this->isWatched;
    }
}
