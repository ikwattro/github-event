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

class PushEvent extends BaseEvent
{
    /**
     *
     */
    const EVENT_TYPE = 'PushEvent';

    /**
     * @var array
     */
    protected $commits = [];

    /**
     * @var string
     */
    protected $reference;

    /**
     * @return string
     */
    public function getEventType()
    {
        return self::EVENT_TYPE;
    }

    /**
     * @return array
     */
    public function getCommits()
    {
        return $this->commits;
    }

    /**
     * @param Commit $commit
     */
    public function addCommit(Commit $commit)
    {
        $this->commits[] = $commit;
    }

    /**
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * @param $ref
     */
    public function setReference($ref)
    {
        $this->reference = (string) $ref;
    }
}
