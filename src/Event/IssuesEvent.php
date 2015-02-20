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

class IssuesEvent extends BaseEvent
{
    /**
     *
     */
    const EVENT_TYPE = 'IssuesEvent';

    /**
     * @var string
     */
    protected $action;

    /**
     * @var Issue
     */
    protected $issue;

    /**
     * @return string
     */
    public function getEventType()
    {
        return self::EVENT_TYPE;
    }

    /**
     * @param $action
     */
    public function setAction($action)
    {
        $this->action = (string) $action;
    }

    /**
     * @return string
     */
    public function getAction()
    {
        return strtoupper($this->action);
    }

    /**
     * @param Issue $issue
     */
    public function setIssue(Issue $issue)
    {
        $this->issue = $issue;
    }

    /**
     * @return Issue
     */
    public function getIssue()
    {
        return $this->issue;
    }
}
