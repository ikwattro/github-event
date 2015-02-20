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

class IssuesEvent extends BaseEvent
{
    const EVENT_TYPE = 'IssuesEvent';

    protected $action;

    protected $issue;

    public function getEventType()
    {
        return self::EVENT_TYPE;
    }

    public function setAction($action)
    {
        $this->action = (string) $action;
    }

    public function getAction()
    {
        return strtoupper($this->action);
    }

    public function setIssue(Issue $issue)
    {
        $this->issue = $issue;
    }

    public function getIssue()
    {
        return $this->issue;
    }
}
