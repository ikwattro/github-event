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

class PushEvent extends BaseEvent
{
    const EVENT_TYPE = 'PushEvent';

    protected $commits = [];

    protected $reference;

    public function getEventType()
    {
        return self::EVENT_TYPE;
    }

    public function getCommits()
    {
        return $this->commits;
    }

    public function addCommit(Commit $commit)
    {
        $this->commits[] = $commit;
    }

    public function getReference()
    {
        return $this->reference;
    }

    public function setReference($ref)
    {
        $this->reference = (string) $ref;
    }
}
